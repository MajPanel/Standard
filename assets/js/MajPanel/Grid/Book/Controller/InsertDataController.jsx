
   /*
    * (c) MajPanel <https://github.com/MajPanel/>
    *
    * For the full copyright and license information, please view the LICENSE
    * file that was distributed with this source code.
    */

	import * as React from "react";
	import * as ReactDOM from "react-dom";
	import { useForm } from "react-hook-form";
	import * as ConfigInsertForm from '../Config/ConfigInsertForm';
    import DialogSuccess from "../../../Alert/DialogSuccess";
    import DialogError from "../../../Alert/DialogError";
	import * as Config from "../Config/Config";
	import {useState} from "react";
	import Divider from "@material-ui/core/Divider";


    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */


	const InsertDataController = (props) => {

		const { rowData } = props;
		const [alertSuccess, setAlertSuccess] = useState(false);
		const [alertError, setAlertError] = useState(false);

		const defaultValues = {
			 		id : '',
				name : '',
				autor : '',
				publisher : '',

		};

		const alertClose = () => {
			setAlertSuccess(false);
			setAlertError(false);
		}

		const { register, handleSubmit, errors, reset , setValue,watch, formState } = useForm({
			defaultValues
		});


		const onSubmit = data => {
			const requestOptions = {
				method: 'POST',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({ data: data })
			};

			fetch(Config.PATH_Insert_API, requestOptions)
			.then(result => result.json())
			.then((result) => {
			if( result.success === "Success" ) {

            				setAlertSuccess(true);
            				setTimeout(() => {
            					setAlertSuccess(false);
            					reset();
            				}, 3000);

            }
				else  {
					alert(result.errors[0].message);
					setAlertError(true);}
			});
		};


		const handleButtonClick = () => {
			reset() // resets "username" field to "admin"
		}

		//console.log(watch(" ")); // you can watch individual input by pass the name of the input

		return (

			<div className="container" Style={'padding-top : 80px'}>
 				<Divider/>
				<div className={'col-lg-12'} >
					<DialogError open={alertError}    handelClose={alertClose} text={'Insert Error API , check atentication API '}   title={'Error'}   />
					<DialogSuccess open={alertSuccess}  handelClose={alertClose} text={'Insert Success , Insert another one  '} title={'Success'}   />
				</div>
				<form onSubmit={handleSubmit(onSubmit)} >


				<div className="form-group">
					<label >Name</label>
					<input type="text" className="form-control"
					       name="name"
					       placeholder="Enter Name" ref={register(ConfigInsertForm.ValidateFields.name)} />
						{errors.name && <small className="form-text  text-danger" >{errors.name.message}</small>}
				</div>

				<div className="form-group">
					<label >Autor</label>
					<input type="text" className="form-control"
					       name="autor"
					       placeholder="Enter Autor" ref={register(ConfigInsertForm.ValidateFields.autor)} />
						{errors.autor && <small className="form-text  text-danger" >{errors.autor.message}</small>}
				</div>

				<div className="form-group">
					<label >Publisher</label>
					<input type="text" className="form-control"
					       name="publisher"
					       placeholder="Enter Publisher" ref={register(ConfigInsertForm.ValidateFields.publisher)} />
						{errors.publisher && <small className="form-text  text-danger" >{errors.publisher.message}</small>}
				</div>


					<input name="id"  type="hidden"  value={'1'} />
					<input type="submit" className={'btn btn-primary mb-2'} />
					{' '}<input type="button" value="Reset" onClick={handleButtonClick} className={'btn btn-secondary mb-2'} />
					{/* <label>FormState:</label> */}
					{/*<label>{JSON.stringify(formState)}</label>*/}
				</form>
			</div>
		);
	}


	export default InsertDataController;

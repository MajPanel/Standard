	/*
	 * (c) MajPanel <https://github.com/MajPanel/>
	 *
	 * For the full copyright and license information, please view the LICENSE
	 * file that was distributed with this source code.
	 */

	import React, {useState} from 'react';
	import { useForm } from "react-hook-form";
	import * as ConfigInsertForm from '../Config/ConfigInsertForm';
	import * as Config from "../Config/Config";
	import Divider from "@material-ui/core/Divider";
	import AlertSuccess from "../../../Alert/AlertSuccess";
	import AlertError from "../../../Alert/AlertError";
	import EditorComponentInsert from "../../../Editor/EditorComponentInsert";
	/**
	 * @author Majid Kazerooni <support@majpanel.com>
	 */
	const InsertDataController = (props) => {

		const { rowData } = props;

		const [contentEditor, setContentEditor] = useState('');
		const [alertSuccess, setAlertSuccess] = useState(false);
		const [alertError, setAlertError] = useState(false);

        const onChangeEditor =(value) =>{
            setContentEditor(value);
        }


		const defaultValues = {
					id : '',
					header : '',
					content : '',
					active : '1',

		};

		const alertClose = () => {
			setAlertSuccess(false);
			setAlertError(false);
		}


		const { register, handleSubmit, errors, reset,setValue,watch, formState } = useForm({
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
						}, 2000);

					} else  {
						setAlertError(true);
					}

				});
		};



	//	console.log(watch("example")); // you can watch individual input by pass the name of the input

		return (

			<div className="container" Style={'padding-top : 80px'}>
				<Divider/>
				<div assName={'col-lg-12'} >
					<AlertSuccess open={alertSuccess} handelClose={alertClose}/>
					<AlertError open={alertError} handelClose={alertClose}/>
				</div>
				<form onSubmit={handleSubmit(onSubmit)} >
					<div className="form-group">
						<label >Header</label>
						<input type="text" className="form-control"
							   name="header"
							   placeholder="Enter Header" ref={register(ConfigInsertForm.ValidateFields.header)} />
							{errors.header && <small className="form-text  text-danger" >{errors.header.message}</small>}
					</div>

					<div className="form-group">
						<label >Content</label>
                        <EditorComponentInsert onChangeHandler={onChangeEditor}  />
						{errors.content && <small className="form-text  text-danger" >{errors.content.message}</small>}

					</div>




						<input type="hidden" className="form-control"
							   name="content" value={contentEditor}
							   placeholder="Enter Content" ref={register(ConfigInsertForm.ValidateFields.content)} />

						<input type="hidden" className="form-control"
							   name="active"
							   placeholder="Enter Active" ref={register(ConfigInsertForm.ValidateFields.active)} />
							{errors.active && <small className="form-text  text-danger" >{errors.active.message}</small>}

					<input name="id"  type="hidden"  value={'1'} />
					<input type="submit" className={'btn btn-primary mb-2'} />
					{/*<label>FormState:</label>*/}
					{/*<label>{JSON.stringify(formState)}</label>*/}
				</form>
			</div>
		);
	}


	export default InsertDataController;

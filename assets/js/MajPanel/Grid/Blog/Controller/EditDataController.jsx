	/*
	 * (c) MajPanel <https://github.com/MajPanel/>
	 *
	 * For the full copyright and license information, please view the LICENSE
	 * file that was distributed with this source code.
	 */

	import React, {useState} from 'react';
	import * as ReactDOM from "react-dom";

	import { useForm } from "react-hook-form";
	import * as ConfigEditForm from '../Config/ConfigEditForm';
	import * as Config from "../Config/Config";
	import AlertSuccess from "../../../Alert/AlertSuccess";
	import AlertError from "../../../Alert/AlertError";
	import Divider from "@material-ui/core/Divider";
	import EditorComponentEdit from "../../../Editor/EditorComponentEdit";
	/**
	 * @author Majid Kazerooni <support@majpanel.com>
	 */

	const EditDataController = (props) => {

		const { rowData } = props;
		const [contentEditor, setContentEditor] = useState( rowData.content);
		const [alertSuccess, setAlertSuccess] = useState(false);
		const [alertError, setAlertError] = useState(false);

		const onChangeEditor =(value) =>{
			setContentEditor(value);
		}

		const defaultValues = {
					id : rowData.id,
					header : rowData.header,
					content : rowData.content,
					active : rowData.active,

		};

		const { register, handleSubmit, errors, setValue,watch, formState } = useForm({
			defaultValues
		});

		const alertClose = () => {
			setAlertSuccess(false);
			setAlertError(false);
		}

		const onSubmit = data => {

			const requestOptions = {
				method: 'PUT',
				headers: { 'Content-Type': 'application/json' },
				body: JSON.stringify({ data: data })
			};

			fetch(Config.PATH_EDIT_API, requestOptions)
			.then(result => result.json())
			.then((result) => {
				if( result.success === "Success" ) {

					setAlertSuccess(true);
					setTimeout(() => {
						setAlertSuccess(false);
					}, 2000);

				}else  {
					setAlertError(true);
				}

			});
		};

		//console.log(watch("example")); // you can watch individual input by pass the name of the input

		return (

			<div className="container" >
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
							   placeholder="Enter Header" ref={register(ConfigEditForm.ValidateFields.header)} />
							{errors.header && <small className="form-text  text-danger" >{errors.header.message}</small>}
					</div>

					<div className="form-group">
						<label >Content</label>
						<EditorComponentEdit onChangeHandler={onChangeEditor} defultValue={contentEditor}/>
						{errors.content && <small className="form-text  text-danger" >{errors.content.message}</small>}

					</div>


						<input type="hidden" className="form-control"
							   name="content" value={contentEditor}
							   placeholder="Enter Content" ref={register(ConfigEditForm.ValidateFields.content)} />


					<div className="form-group">
						<label >Active</label>

						<select    name="active" className="form-control"
								   ref={register(ConfigEditForm.ValidateFields.active)}>
							<option value={''}>Choose...</option>
							<option value="1" selected>True</option>
							<option value="0">False</option>
						</select>
							{errors.active && <small className="form-text  text-danger" >{errors.active.message}</small>}
					</div>


					<input name="id"  type="hidden"  ref={register(ConfigEditForm.ValidateFields.id)} />
					<input type="submit" className={'btn btn-primary mb-2'} />
					{/*<label>FormState:</label>*/}
					{/*<label>{JSON.stringify(formState)}</label>*/}
				</form>

			</div>
		);
	}


	export default EditDataController;

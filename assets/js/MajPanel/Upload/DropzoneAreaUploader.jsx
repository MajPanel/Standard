import React, { Component } from 'react'
import {DropzoneDialog} from 'material-ui-dropzone'
import Button from '@material-ui/core/Button';
import CloudUploadIcon from '@material-ui/icons/CloudUpload';


export default class DropzoneAreaUploader extends Component {
	constructor(props) {
		super(props);
		this.state = {
			open: false,
			files: []
		};
	}

	handleClose() {
		this.setState({
			open: false
		});

	}

	handleSave(files) {
		//Saving files to state for further use and closing Modal.
		this.setState({
			files: files,
			open: false
		});

		var formData = new FormData();

		files.map((file, index) => {
			formData.append(`file${index}`, file);
		});
		formData.append(`id`, this.props.rowId);

		fetch(this.props.UploadPath, {
			// content-type header should not be specified!
			method: 'POST',
			body: formData,
		})
		.then(response => response.json())
		.then(success => {

			this.props.reLoad();
			// Do something with the successful response
		})
		.catch(error => console.log(error)
		);


	}

	handleOpen() {
		this.setState({
			open: true,
		});
	}

	render() {
		return (

			<div>
				<div className="col-lg-12">
					<div className="card-body">
						<Button onClick={this.handleOpen.bind(this)} className={'btn btn-primary btn-lg '}>
							<CloudUploadIcon/> Upload File
						</Button>
					</div>
				</div>


				<DropzoneDialog
					open={this.state.open}
					onSave={this.handleSave.bind(this)}
					acceptedFiles={['image/jpeg', 'image/png', 'image/bmp']}
					showPreviews={true}
					maxFileSize={5000000}
					onClose={this.handleClose.bind(this)}
				/>
			</div>
		);
	}
}

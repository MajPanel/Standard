
   /*
    * (c) MajPanel <https://github.com/MajPanel/>
    *
    * For the full copyright and license information, please view the LICENSE
    * file that was distributed with this source code.
    */

	import * as React from "react";
	import Delete from '@material-ui/icons/Delete';
	import * as Config from "../Config/Config";
	import DropzoneAreaUploader from "../../../Upload/DropzoneAreaUploader";
	import {useState} from "react";

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

	const UploadDataController = (props) => {

		const { rowId,rowData,reLoad } = props;
		const [filepath, setfilepath] = useState(0);

		const Deletefile = (event) => {
			let pathfile=event.currentTarget.dataset.tag;
			var formData = new FormData();
			formData.append(`path`, pathfile);

			  fetch(Config.PATH_DELETE_FILES, {
				// content-type header should not be specified!
				method: 'POST',
				body: formData,
			})
			.then(response => response.json())
			.then(success => {
				reLoad();
				// Do something with the successful response
			})
			.catch(error => console.log(error)
			);

		}

		const handelreload = () => {
			reLoad();
		};

		const entityImages = rowData.map((image) =>{
			return (
					<div className={'col-lg-2 '} >
						<div className={'card '}  >
							<img src={image['file_path']}  className={'img-thumbnail img-manager'} />
							<div className={'card-body text-center'}>
								<h5 className={'card-title res-text'}>{image['filename']}</h5>
								<a href="#" className={'btn btn-danger btn-sm'} onClick={Deletefile} data-tag={image['file_path']}  ><Delete/> DELETE </a>
							</div>
						</div>
					</div>

				);
		}  );

		return (
		<div >
				<div className={'container'}>
					<DropzoneAreaUploader UploadPath={Config.PATH_Upload_API} rowId={rowId} reLoad={handelreload}  />
				</div>
			<div className={'row'}>
				{entityImages}
			</div>

		</div>
		);
	}


	export default UploadDataController;

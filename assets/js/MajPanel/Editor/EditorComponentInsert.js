import React from 'react';
import SunEditor,{buttonList}  from 'suneditor-react';
import * as Template from './Template';

const EditorComponentInsert = (props) => {

	const {onChangeHandler} =props ;

	const handleChange = (content) => {
	//	console.log(content); //Get Content Inside Editor
	}

	const handleBlur = (event, editorContents) => {
		onChangeHandler(editorContents);
		console.log(event, editorContents); //Get the blur event
	}

	const handleVideoUpload = (targetElement, index, state, info, remainingFilesCount) =>{
		console.log(targetElement, index, state, info, remainingFilesCount)
	}

	const handleImageUpload = (targetImgElement, index, state, imageInfo, remainingFilesCount) => {
		console.log(targetImgElement, index, state, imageInfo, remainingFilesCount)
	}

	const handleImageUploadBefore = (files, info, uploadHandler) => {
		// uploadHandler is a function
		console.log(files, info)
	}

	const handleAudioUpload = (targetElement, index, state, info, remainingFilesCount) => {
		console.log(targetElement, index, state, info, remainingFilesCount)
	}

	return (
		    <div>

				<p> My Other Contents </p>
				<SunEditor
					width="100%"
					lang="en"
					setOptions={{
						height: 200,
						templates :Template.TETMPLATE,
						buttonList: [
							['undo', 'redo'],
							['font', 'fontSize', 'formatBlock'],
							['paragraphStyle', 'blockquote'],
							['bold', 'underline', 'italic', 'strike', 'subscript', 'superscript'],
							['fontColor', 'hiliteColor', 'textStyle'],
							['removeFormat'],
							'/', // Line break
							['outdent', 'indent'],
							['align', 'horizontalRule', 'list', 'lineHeight'],
							['table', 'link', 'image', 'video', 'audio' /** ,'math' */], // You must add the 'katex' library at options to use the 'math' plugin.
							['fullScreen', 'showBlocks', 'codeView'],
							['preview', 'print'],
							['save', 'template']
						]
					}}
					onChange={handleChange}
					onBlur={handleBlur}
					placeholder="Please type here..."
					enableToolbar={true}
					showToolbar={true} />
			</div>

		)

}
export default EditorComponentInsert;

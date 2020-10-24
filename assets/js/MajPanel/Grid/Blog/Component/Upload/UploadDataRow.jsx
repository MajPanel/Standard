import useFetch from 'fetch-suspense';
import React, { Suspense } from 'react';
import UploadDataController from "../../Controller/UploadDataController";
import * as Config from "../../Config/Config";

class UploadDataRow extends React.Component {

	constructor(props) {
		super(props);
		this.state = {
			reload: Math.random()
		};
	}

	render() {

		const handelreload = () => {
			this.setState({
				reload: Math.random()
			});
		};

		const MyFetchingComponent = () => {
			const response = useFetch(Config.PATH_GET_FILES+this.props.idRow+'?'+this.state.reload, { method: 'GET' });
			return  <UploadDataController rowData={response} rowId={this.props.idRow} reLoad={handelreload}/>;
		};

		return (
			<div>
			<Suspense fallback="Loading...">
				<MyFetchingComponent />
			</Suspense>
			</div>

		);
	}
}

export default UploadDataRow;

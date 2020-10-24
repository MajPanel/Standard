import useFetch from 'fetch-suspense';
import React, { Suspense } from 'react';
import EditDataController from "../../Controller/EditDataController";
import * as Config from '../../Config/Config';

class EditDataRow extends React.Component {

	constructor(props) {
		super(props);

	}

	render() {
		const MyFetchingComponent = () => {
			const response = useFetch(Config.PATH_GET_ID_EDIT_API+this.props.idRow+'/?'+this.props.reload, { method: 'GET' });

			return  <EditDataController rowData={response} />;
		};

		return (
			<Suspense fallback="Loading...">
				<MyFetchingComponent />
			</Suspense>

		);
	}
}

export default EditDataRow;

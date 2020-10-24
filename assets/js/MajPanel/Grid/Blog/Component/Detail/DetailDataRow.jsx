import useFetch from 'fetch-suspense';
import React, { Suspense } from 'react';
import DetailDataController from "../../Controller/DetailDataController";
import * as Config from '../../Config/Config';

class DetailDataRow extends React.Component {

	constructor(props) {
		super(props);

	}

	render() {
		const MyFetchingComponent = () => {
			const response = useFetch(Config.PATH_GET_ID_DETAIL_API+this.props.idRow+'/?'+this.props.reload, { method: 'GET' });
			return  <DetailDataController rowData={response}/>;
		};

		return (
			<Suspense fallback="Loading...">
				<MyFetchingComponent />
			</Suspense>

		);
	}
}

export default DetailDataRow;

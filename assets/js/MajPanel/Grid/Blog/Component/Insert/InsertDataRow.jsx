import useFetch from 'fetch-suspense';
import React, { Suspense } from 'react';
import InsertDataController from "../../Controller/InsertDataController";

class InsertDataRow extends React.Component {

	constructor(props) {
		super(props);

	}

	render() {
		const MyFetchingComponent = () => {
			return  <InsertDataController />;
		};

		return (
			<Suspense fallback="Loading...">
				<MyFetchingComponent />
			</Suspense>

		);
	}
}

export default InsertDataRow;

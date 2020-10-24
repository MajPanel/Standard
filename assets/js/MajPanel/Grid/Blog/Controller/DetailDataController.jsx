	/*
	 * (c) MajPanel <https://github.com/MajPanel/>
	 *
	 * For the full copyright and license information, please view the LICENSE
	 * file that was distributed with this source code.
	 */

	import React, {useState} from 'react';
	import Divider from "@material-ui/core/Divider";

	/**
	 * @author Majid Kazerooni <support@majpanel.com>
	 */

	export default (props) => {

		const { rowData } = props;

		return (
			<div className="container">
						<Divider/>
						<div className="form-group row">
							<label >Id</label> :
							<small className="form-text font-weight-normal text-danger" > {rowData.id} </small>
						</div>

						<div className="form-group row">
							<label >Header</label> :
							<small className="form-text font-weight-normal text-danger" > {rowData.header} </small>
						</div>

						<div className="form-group row">
							<label >Content</label> :
							<span dangerouslySetInnerHTML={{__html: rowData.content}} />
						</div>

						<div className="form-group row">
							<label >CreatedAt</label> :
							<small className="form-text font-weight-normal text-danger" > {rowData.created_at} </small>
						</div>

						<div className="form-group row">
							<label >ModifiedAt</label> :
							<small className="form-text font-weight-normal text-danger" > {rowData.modified_at} </small>
						</div>

						<div className="form-group row">
							<label >Active</label> :
							<small className="form-text font-weight-normal text-danger" > {rowData.active} </small>
						</div>

			</div>
		)

	}

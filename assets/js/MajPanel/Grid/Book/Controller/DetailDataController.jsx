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
						<label > Id :  </label> 
						<small className="form-text font-weight-normal text-danger" > {rowData.id} </small>
					</div>
				
					<div className="form-group row">
						<label > Name :  </label> 
						<small className="form-text font-weight-normal text-danger" > {rowData.name} </small>
					</div>
				
					<div className="form-group row">
						<label > Autor :  </label> 
						<small className="form-text font-weight-normal text-danger" > {rowData.autor} </small>
					</div>
				
					<div className="form-group row">
						<label > Publisher :  </label> 
						<small className="form-text font-weight-normal text-danger" > {rowData.publisher} </small>
					</div>
				
			</div>
		)

	}

   /*
    * (c) MajPanel <https://github.com/MajPanel/>
    *
    * For the full copyright and license information, please view the LICENSE
    * file that was distributed with this source code.
    */
    import useFetch from 'fetch-suspense';
    import React, { Suspense } from 'react';
    import UploadDataController from "../../Controller/UploadDataController";
    import * as Config from "../../Config/Config";
    import EditDataController from "../../Controller/EditDataController";

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

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

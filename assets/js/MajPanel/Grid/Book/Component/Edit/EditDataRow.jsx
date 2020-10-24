   /*
    * (c) MajPanel <https://github.com/MajPanel/>
    *
    * For the full copyright and license information, please view the LICENSE
    * file that was distributed with this source code.
    */
    import useFetch from 'fetch-suspense';
    import React, { Suspense } from 'react';
    import EditDataController from "../../Controller/EditDataController";
    import * as Config from '../../Config/Config';

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

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

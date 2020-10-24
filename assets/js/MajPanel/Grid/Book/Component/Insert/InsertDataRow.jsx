   /*
    * (c) MajPanel <https://github.com/MajPanel/>
    *
    * For the full copyright and license information, please view the LICENSE
    * file that was distributed with this source code.
    */

    import React, { Suspense } from 'react';
    import InsertDataController from "../../Controller/InsertDataController";

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

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

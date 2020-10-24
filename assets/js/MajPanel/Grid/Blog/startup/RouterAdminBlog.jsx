import React, {Suspense} from "react";
import ReactDOM from "react-dom";
import {
	BrowserRouter as Router,
	Switch,
	Route,
	Link
} from "react-router-dom";
import { ConfirmProvider } from "material-ui-confirm";


import Home from "../home";

const RouterAdminBlog = (props) => {
	//alert(props.data1)
	return (
		<Router>
			<div>
				<Switch>
					<Route path="/">
						<Suspense fallback="Loading...">
							<ConfirmProvider>
							<Home />
							</ConfirmProvider>
						</Suspense>
					</Route>
				</Switch>
			</div>
		</Router>
	);
}
export default RouterAdminBlog;
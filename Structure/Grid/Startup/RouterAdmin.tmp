import React from "react";
import {
	BrowserRouter as Router,
	Switch,
	Route,
	Link
} from "react-router-dom";

import Home from "../home";
import { ConfirmProvider } from "material-ui-confirm";


export default function App() {
	return (
		<Router>
			<div>
				<Switch>

					<Route path="/">
					<ConfirmProvider>
                    	<Home />
                    </ConfirmProvider>
					</Route>
				</Switch>
			</div>
		</Router>
	);
}

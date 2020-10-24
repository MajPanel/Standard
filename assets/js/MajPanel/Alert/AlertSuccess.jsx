import Alert from '@material-ui/lab/Alert';
import IconButton from '@material-ui/core/IconButton';
import Collapse from '@material-ui/core/Collapse';
import CloseIcon from '@material-ui/icons/Close';
import React, {useState} from "react";

const AlertSuccess = (props) => {
    const { open,handelClose } = props;
    return (
        <Collapse in={open}>
                <Alert severity="success"
                    action={
                        <IconButton
                            aria-label="close"
                            color="inherit"
                            size="small"
                            onClick={() => {
                                handelClose();
                            }}
                        >
                            <CloseIcon fontSize="inherit" />
                        </IconButton>
                    }
                > success API !
                </Alert>
        </Collapse>
    )

}

export default AlertSuccess;


import React , {useState} from 'react';
import Button from '@material-ui/core/Button';
import Dialog from '@material-ui/core/Dialog';
import DialogActions from '@material-ui/core/DialogActions';
import DialogContent from '@material-ui/core/DialogContent';
import DialogContentText from '@material-ui/core/DialogContentText';
import DialogTitle from '@material-ui/core/DialogTitle';
import FeedbackIcon from '@material-ui/icons/Feedback';

const DialogSuccess = (props) => {

    const {open,handelClose,text,title}=props;

    return (
        <div>

            <Dialog
                open={open}
                fullWidth={true}
                onClose={() => {
                    handelClose();
                }}
            >
                <DialogTitle id="alert-dialog-title"><FeedbackIcon style={{fill: "green"}} /> {title} </DialogTitle>
                <DialogContent>
                    <DialogContentText style={{color: "green"}}  id="alert-dialog-description">
                        {text}
                    </DialogContentText>
                </DialogContent>
                <DialogActions>
                    <Button  onClick={() => {
                        handelClose();
                    }} color="primary" autoFocus>
                        Close
                    </Button>
                </DialogActions>
            </Dialog>
        </div>
    );

}

export default DialogSuccess;


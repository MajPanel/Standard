    /*
     * (c) MajPanel <https://github.com/MajPanel/>
     *
     * For the full copyright and license information, please view the LICENSE
     * file that was distributed with this source code.
     */

    import React, {useState} from 'react';
    import Dialog from '@material-ui/core/Dialog';
    import IconButton from "@material-ui/core/IconButton";
    import AppBar from "@material-ui/core/AppBar";
    import Toolbar from "@material-ui/core/Toolbar";
    import CloseIcon from "@material-ui/icons/Close";
    import {makeStyles} from "@material-ui/core/styles";

    import Slide from "@material-ui/core/Slide";
    import DetailDataRow from "./Detail/DetailDataRow";
    import EditDataRow from "./Edit/EditDataRow";
    import InsertDataRow from "./Insert/InsertDataRow";
    import UploadDataRow from "./Upload/UploadDataRow";
    import Typography from "@material-ui/core/Typography";

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

    const DialogBox = (props) => {
            const { open, onChangeOpen, dataRow,typeDialogBox } = props;
            const useStyles = makeStyles((theme) => ({
                appBar: {
                    position: 'relative',
                },
                title: {
                    marginLeft: theme.spacing(2),
                    flex: 1,
                },
            }));
            //const [open, setOpen] = useState(false);


            const handleClose = () => {
                onChangeOpen();
            };


            const classes = useStyles();

            const Transition = React.forwardRef(function Transition(props, ref) {
                return <Slide direction="up" ref={ref} {...props} />;
            });

            return (
                <Dialog  fullScreen open={open}  TransitionComponent={Transition}>
                    <AppBar className={classes.appBar}>
                        <Toolbar>
                            <IconButton edge="start" color="inherit"  aria-label="close" onClick={handleClose}>
                                <CloseIcon />
                            </IconButton>
                            <Typography variant="h6" >
                                {typeDialogBox}
                            </Typography>
                        </Toolbar>
                    </AppBar>

                    {(function() {
                        switch (typeDialogBox) {
                            case 'Detail':
                                return <DetailDataRow idRow={dataRow} reload={Math.random()} />;
                            case 'Edit':
                                return <EditDataRow idRow={dataRow} reload={Math.random()} />;
                            case 'Insert':
                                return <InsertDataRow  idRow={'0'} reload={open} />;
                            case 'Gallery':
                                return <UploadDataRow  idRow={dataRow} reload={open} />;
                        }
                    })()}

                </Dialog>

            );
        };
        export default DialogBox;

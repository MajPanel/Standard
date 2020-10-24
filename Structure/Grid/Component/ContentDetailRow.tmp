   /*
    * (c) MajPanel <https://github.com/MajPanel/>
    *
    * For the full copyright and license information, please view the LICENSE
    * file that was distributed with this source code.
    */

    import React, {useState} from "react";
    import Button from "@material-ui/core/Button";
    import DialogBox from "./DialogBox";
    import Detail from "@material-ui/icons/FeaturedPlayList";
    import EditIcon from "@material-ui/icons/Edit";
    import CloudUploadIcon from '@material-ui/icons/CloudUpload';
    import {makeStyles} from "@material-ui/core/styles";

    /**
     * @author Majid Kazerooni <support@majpanel.com>
     */

     const ContentDetailRow = (props) => {

                const {onChangeStatus } = props;
                const useStyles = makeStyles((theme) => ({
                    root: {
                        '& > *': {
                            margin: theme.spacing(1),
                        },
                    },
                    appBar: {
                        position: 'relative',
                    },
                    title: {
                        marginLeft: theme.spacing(2),
                        flex: 1,
                    },
                }));
                const [open, setOpen] = useState(false);
                const [typeDialogBox, settypeDialogBox] = useState('');


                const handleClickOpenDetail = () => {
                    setOpen(true);
                    settypeDialogBox('Detail');
                };



                const handleClickOpenEdit = () => {
                    setOpen(true);
                    settypeDialogBox('Edit');
                };

                const handleClickOpenGallery= () => {
                    setOpen(true);
                    settypeDialogBox('Gallery');
                };


                const handleClose = () => {
                    setOpen(false);
                    settypeDialogBox('');
                    onChangeStatus();
                };

                const classes = useStyles();
                const {title, dataRow} = props;

                return (

                <div className={classes.root}>
                    Details for
                    {' : '}{dataRow.id}
                    <Button
                        variant="contained"
                        color="primary"
                        startIcon={<EditIcon />}
                        onClick={handleClickOpenEdit}
                    >
                        Edit
                    </Button>

                    <Button

                        variant="contained"
                        color="default"
                        startIcon={<Detail />}
                        onClick={handleClickOpenDetail}
                    >
                        Detail
                    </Button>


                    <Button
                        variant="contained"
                        color="primary"
                        startIcon={<CloudUploadIcon />}
                        onClick={handleClickOpenGallery}
                    >
                        Upload
                    </Button>

                    <DialogBox dataRow={dataRow.id}  open={open}  onChangeOpen={handleClose} typeDialogBox={typeDialogBox} />

                </div>
                );
      };

     export default ContentDetailRow;

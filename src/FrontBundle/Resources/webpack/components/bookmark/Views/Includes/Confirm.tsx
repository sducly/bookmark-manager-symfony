import * as React from 'react';
import { Button, Modal, ModalHeader, ModalFooter } from 'reactstrap';
import { IConfirmProps } from '../../interface';

export default class Confirm extends React.Component<IConfirmProps, {}> {
    constructor(props: any) {
        super(props);
    }

    render() {
        const { isOpen, cancelAction, validAction } = this.props;
        return (
            <div>
                <Modal isOpen={isOpen} className={this.props.className}>
                    <ModalHeader>
                        Delete this bookmark ?
                    </ModalHeader>
                    <ModalFooter>
                        <Button color="secondary" onClick={() => cancelAction()}>Cancel</Button>{' '}
                        <Button color="danger" onClick={() => validAction()}>Confirm</Button>
                    </ModalFooter>
                </Modal>
            </div>
        );
    }
}
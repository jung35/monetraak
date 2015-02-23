var MoneyIndex = React.createClass({

    loadMoneyListFromServer: function() {
        $.ajax({
            url: '/api/v1/money',
            dataType: 'json',
            success: function(data) {
                this.setState({data: data});
            }.bind(this),
            error: function(xhr, status, err) {
                console.error(this.props.url, status, err.toString());
            }.bind(this)
        });

    },

    submitFormToServer: function(title, description) {
        alert('adfadsfasdfa');
        // $.ajax({
        //     url: '/api/v1/money',
        //     dataType: 'json',
        //     type: 'POST',
        //     data: {
        //         _token: _crsf,
        //         title: title,
        //         description: description
        //     },
        //     success: function(data) {
        //         this.setState({data: data});
        //     }.bind(this),
        //         error: function(xhr, status, err) {
        //         console.error(this.props.url, status, err.toString());
        //     }.bind(this)
        // });
    },

    getInitialState: function() {
        return {
            data: []
        };
    },

    componentDidMount: function() {
        this.loadMoneyListFromServer();
    },

    render: function() {
        var moneyItemNodes = this.state.data.map(function (moneyItem) {
            return (
                <div key={moneyItem.id} className="col-xs-12 col-sm-6 col-md-4">
                    <a href={"/money/" + moneyItem.id}>
                        <div className="panel panel-custom">
                            <div className="panel-heading">
                                {moneyItem.title}
                            </div>
                            <div className="panel-body">
                                <p>{moneyItem.description}</p>
                            </div>
                        </div>
                    </a>
                </div>
            );
        });

        return (
            <div className="row">
                <MoneyForm MoneyFormSend={this.submitFormToServer} />
                {moneyItemNodes}
            </div>
        );
    }
});

var MoneyForm = React.createClass({

    handleSubmit: function(e) {
        e.preventDefault();

        var title       = this.refs.title.getDOMNode().value.trim()
        ,   description = this.refs.description.getDOMNode().value.trim();

        if (!title || !description) {
            return;
        }

        this.props.MoneyFormSend({
            title: title,
            description: description
        });

        this.refs.title.getDOMNode().value = '';
        this.refs.description.getDOMNode().value   = '';
    },

    render: function() {
        return (
            <div className="modal fade" id="moneyCreateModal" tabIndex="-1" role="dialog" aria-labelledby="moneyCreateModalLabel" aria-hidden="true">
                <div className="modal-dialog">
                    <div className="modal-content">
                        <div className="modal-header">
                            <button type="button" className="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 className="modal-title" id="moneyCreateModalLabel">Create New Tracker</h4>
                        </div>
                        <form onSubmit={this.handleSubmit}>
                            <div className="modal-body">
                                <div className="form-group">
                                    <label htmlFor="title">Title:</label>
                                    <input className="form-control" ref="title" type="text" id="title" />
                                </div>

                                <div className="form-group">
                                    <label htmlFor="description">Description:</label>
                                    <textarea className="form-control" ref="description" cols="50" rows="10" id="description" />
                                </div>
                            </div>
                            <div className="modal-footer">
                                <button type="button" className="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" className="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        );
    }
});

React.render(
    <MoneyIndex />,
    document.getElementById('moneyList')
);
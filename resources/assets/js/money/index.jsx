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
    getInitialState: function() {
        return {
            data: []
        };
    },
    componentDidMount: function() {
        this.loadMoneyListFromServer();
    },
    render: function() {
        return (
            <MoneyItem data={this.state.data} />
        );
    }
});

var MoneyItem = React.createClass({
    render: function() {
        var moneyItemNodes = this.props.data.map(function (moneyItem) {
            return (
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
            );
        });
        return (
            <div className="col-xs-12 col-sm-6 col-md-4">
                {moneyItemNodes}
            </div>
        );
    }
});

React.render(
  <MoneyIndex />,
  document.getElementById('moneyList')
);
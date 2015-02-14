<div class="modal fade" id="moneyReceived" tabindex="-1" role="dialog" aria-labelledby="moneyReceivedLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="moneyReceivedLabel">Add Money Received</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <div class="input-group">
                            <span class="input-group-addon">$</span>
                            <input type="text" name="amount" class="form-control" id="amount" placeholder="0.00">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Extra Notes</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Work"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
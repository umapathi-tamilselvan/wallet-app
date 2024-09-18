<form action="#" method="POST" style="margin-top:20px;">
    @csrf
    <div class="form-group " style="width: 500px;>
        <label for="amount">Account:</label>
        <input type="text" name="amount" class="form-control" required>
    </div>
    <div class="form-group " style="width: 500px;>
        <label for="amount">Amount:</label>
        <input type="number" name="amount" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-warning mt-2">Transfer</button>
</form>


<!DOCTYPE html>
<html>
    <table class="table">
        <tbody>
            <tr>
                <td>Amount</td>
                <td>₱ {{$total}}</td>
            </tr>
            <tr>
                <td>Delivery Fee</td>
                <td>₱ 60</td>
            </tr>
        </tbody>
    </table>
    <form action="/orderplaced" method="POST">
        @csrf
        <textarea name="address" placeholder="Enter your receiving address: " class="form-control"></textarea><br>
    <label for="payment">Choose your payment method:</label><br>
    <input type="radio" value="cash" name="payment"> <span>E-Wallet(Gcash,Maya,Coins,etc.)</span><br>
    <input type="radio" value="cash" name="payment"> <span>Credit/Debit Card</span><br>
    <input type="radio" value="cash" name="payment"> <span>Cash on Delivery</span><br>
    <button type="submit" class="btn btn-default">Checkout</button>
    </form>

</html>
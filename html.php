<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .header {
        
            text-align: center;
            padding: 1px 0;
            background-color: #fff;
            border-bottom: 1px solid #ccc;
            margin-bottom: 5px; /* Adjust the margin as needed */
        }
        .header img {
            width: 200px;
        }
        .tab-container {
            display: flex;
            justify-content: center;
            margin: 10px 0;
            margin-bottom: 5px;
        }
        .tab {
            padding: 10px 10px;
            background-color: #e0e0e0;
            border: 1px solid #ccc;
            border-radius: 5px 5px 0 0;
            margin-right: 5px;
            cursor: pointer;
        }
        .tab.active {
            background-color: #fff;
            border-bottom: none;
            color: #333;
        }
        .form-container {
            width: 800px;
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            font-size: 12px;
        }
        .form-section {
            margin-bottom: 20px;
        }
        .form-section h2 {
            margin-bottom: 10px;
            font-size: 1.2em;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 7px;
            box-sizing: border-box;
        }
        .form-group input[type="radio"] {
            width: auto;
            margin-right: 5px;
        }
        .form-columns {
            display: flex;
            justify-content: space-between;
        }
        .form-column {
            width: 48%;
        }
        .submit-btn {
            background-color: #FFD700;
            color: #000;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            width: 100%;
        }
        /* Ensure the expiration inputs are displayed inline */
.expiration-container {
    display: flex;
    gap: 10px; /* Adjust the gap between the inputs */
}

.expiration-container input {
    width: 230px; /* Adjust width to make both inputs fit well side by side */
    padding: 8px; /* Adjust padding as needed */
    text-align: center; /* Center the placeholder text */
    box-sizing: border-box; /* Ensure padding and borders are included in the width */
}

    </style>
</head>
<body>

    <div class="header">
        <img src="Stalbans logo.png" alt="stalbans printing"> <!-- Replace with actual logo image path -->
        <div class="tab-container">
            <div class="tab active">Transaction</div>
            <div class="tab">Contact Information</div>
        </div>
    </div>

    <div class="form-container">
        <form action="bill.php" method="POST" enctype="multipart/form-data">
            <div class="form-columns">
                <div class="form-column">
                    <div class="form-section">
                        <h2>Billing Information</h2>
                        <div class="form-group">
                            <label for="bill-name">Bill Name*</label>
                            <input type="text" id="bill-name" name="bill-name" >
                        </div>
                        <div class="form-group">
                            <label for="bill-street">Bill Street*</label>
                            <input type="text" id="bill-street" name="bill-street" >
                        </div>
                        <div class="form-group">
                            <label for="city">City*</label>
                            <input type="text" id="city" name="city" >
                        </div>
                        <div class="form-group">
                            <label for="state">State*</label>
                            <select id="state" name="state" >
                                <option value="">Select State</option>
                                <!-- Add state options here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="zip">Zip*</label>
                            <input type="text" id="zip" name="zip" >
                        </div>
                        <div class="form-group">
                            <label for="bill-phone">Bill Phone*</label>
                            <input type="text" id="bill-phone" name="bill-phone" >
                        </div>
                      
                    </div>

                    <div class="form-section">
                        <h2>Transaction Details</h2>
                        <div class="form-group">
                            <label for="invoice">Invoice*</label>
                            <input type="text" id="invoice" name="invoice" >
                        </div>
                        <div class="form-group">
                            <label for="notes">Notes</label>
                            <input type="text" id="notes" name="notes">
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount*</label>
                            <input type="text" id="amount" name="amount">
                        </div>
                    </div>
                </div>

                <div class="form-column">
                    <div class="form-section">
                        <h2>Payment Information</h2>
                      
                        <div class="form-group">
                            <label for="card-number">Card Number*</label>
                            <input type="text" id="card-number" name="card-number" required>
                        </div>
                        <div class="form-group">
                            <label for="expiration">Expiration*</label>
                            <div class="expiration-container">
                            <input type="number" id="expiration-month" name="expiration-month" placeholder="MM" required>
                            <input type="number" id="expiration-year" name="expiration-year" placeholder="YYYY" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cvv">CVV*</label>
                            <input type="text" id="cvv" name="cvv" required>
                        </div>
                        <div class="form-group">
                            <label for="card-holder">Card Holder Name</label>
                            <input type="text" id="card-holder" name="card-holder" required>
                        </div>
                        <div class="form-group">
                            <label for="total">Total</label>
                            <input type="text" id="total" name="total" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="submit-btn">Process Payment</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</body>
</html>

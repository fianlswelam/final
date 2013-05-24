<?php

/**
 * 
 * Sample IPN Handler for Subscription Payments
 * 
 * The purpose of this code is to help you to understand how to process the Instant Payment Notification 
 * variables for a payment received through Payza's buttons and integrate it in your PHP site. The following
 * code will ONLY handle SUBSCRIPTION payments. For handling IPNs for ITEMS, please refer to the appropriate
 * sample code file.
 * 	
 * Put this code into the page which you have specified as Alert URL.
 * The conditional blocks provide you the logical placeholders to process the IPN variables. It is your responsibility
 * to write appropriate code as per your requirements.
 * 	
 * If you have any questions about this script or any suggestions, please visit us at: dev.payza.com
 * 
 *
 * THIS CODE AND INFORMATION ARE PROVIDED "AS IS" WITHOUT WARRANTY
 * OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING BUT NOT
 * LIMITED TO THE IMPLIED WARRANTIES OF FITNESS FOR A PARTICULAR PURPOSE.
 * 
 * @author Payza
 * @copyright 2011
 */
//The value is the url address of IPN V2 handler and the identifier of the token string 
define("IPN_V2_HANDLER", "https://secure.payza.com/ipn2.ashx");
define("TOKEN_IDENTIFIER", "token=");

// get the token from Payza
//$token = urlencode($_REQUEST['token']);

//preappend the identifier string "token=" 
$token = TOKEN_IDENTIFIER . $token;

/**
 * 
 * Sends the URL encoded TOKEN string to the Payza's IPN V2
 * using cURL and retrieves the response.
 * 
 * variable $response holds the response string from the Payza's IPN V2.
 */
$response = '';

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, IPN_V2_HANDLER);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 60);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

curl_close($ch);

if (strlen($response) > 0) {
    //urldecode the received response from Payza's IPN V2
    $response = urldecode($response);

    if ($response == "INVALID TOKEN") {
        echo 'the token is not valid';
    } else {
        echo 'split the response string by the delimeter "&"';
        $aps = explode("&", $response);
        /* 	
          //create a file to save the response information from Payza's IPN V2
          $myFile = "IPNSubRes.txt";
          $fh = fopen($myFile,'a') or die("can't open the fi-le");


          //define an array to put the IPN information
          $info = array();

          foreach ($aps as $ap)
          {
          //put the IPN information into an associative array $info
          $ele = explode("=", $ap);
          $info[$ele[0]] = $ele[1];

          //write the information to the file IPNRes.txt
          fwrite($fh, "$ele[0] \t");
          echo "$ele[0]";
          fwrite($fh, "=\t");
          fwrite($fh, "$ele[1]\r\n");
          echo "$ele[1]</br>";

          }

          fclose($fh);

         */
        //Setting information about the transaction from the IPN post variables
        $receivedMerchantEmailAddress = $info['ap_merchant'];
        $transactionStatus = $info['ap_status'];
        $testModeStatus = $info['ap_test'];
        $purchaseType = $info['ap_purchasetype'];
        $currency = $info['ap_currency'];
        $totalAmountReceived = $info['ap_totalamount'];
        $feeAmount = $info['ap_feeamount'];
        $netAmount = $info['ap_netamount'];
        $transactionReferenceNumber = $info['ap_referencenumber'];
        $transactionDate = $info['ap_transactiondate'];
        $transactionType = $info['ap_transactiontype'];
        $alertUrl = $info['ap_alerturl'];

        //Setting the subscription's information from the IPN post variables
        $subscriptionReferenceNumber = $info['ap_subscriptionreferencenumber'];
        $subscriptionSetupCost = $info['ap_setupamount'];
        $subscriptionTimeUnit = $info['ap_timeunit'];
        $subscriptionPeriodLength = $info['ap_periodlength'];
        $subscriptionPeriodCount = $info['ap_periodcount'];
        $subscriptionTrialAmount = $info['ap_trialamount'];
        $subscriptionTrialTimeUnit = $info['ap_trialtimeunit'];
        $subscriptionTrialPeriodLength = $info['ap_trialperiodlength'];
        $subscriptionNextRunDate = $info['ap_nextrundate'];
        $subscriptionPaymentNumber = $info['ap_subscriptionpaymentnumber'];
        $subscriptionCancelledBy = $info['ap_cancelledby'];
        $subscriptionCancelNotes = $info['ap_cancelnotes'];

        //Setting the customer's information from the IPN post variables
        $customerFirstName = $info['ap_custfirstname'];
        $customerLastName = $info['ap_custlastname'];
        $customerAddress = $info['ap_custaddress'];
        $customerCity = $info['ap_custcity'];
        $customerState = $info['ap_custstate'];
        $customerCountry = $info['ap_custcountry'];
        $customerZipCode = $info['ap_custzip'];
        $customerEmailAddress = $info['ap_custemailaddress'];
        $shipAddress = $info['ap_shipaddress'];
        $shipCity = $info['ap_shipcity'];
        $shipState = $info['ap_shipstate'];
        $shipCountry = $info['ap_shipcountry'];
        $shipZip = $info['ap_shipzip'];

        //Setting information about the purchased service from the IPN post variables
        $itemName = $info['ap_itemname'];
        $itemCode = $info['ap_itemcode'];
        $itemDescription = $info['ap_description'];
        $itemQuantity = $info['ap_quantity'];
        $itemAmount = $info['ap_amount'];

        //Setting extra information about the purchased item from the IPN post variables
        $additionalCharges = $info['ap_additionalcharges'];
        $shippingCharges = $info['ap_shippingcharges'];
        $taxAmount = $info['ap_taxamount'];
        $discountAmount = $info['ap_discountamount'];

        //Setting your customs fields received from the IPN post variables
        $myCustomField_1 = $info['apc_1'];
        $myCustomField_2 = $info['apc_2'];
        $myCustomField_3 = $info['apc_3'];
        $myCustomField_4 = $info['apc_4'];
        $myCustomField_5 = $info['apc_5'];
        $myCustomField_6 = $info['apc_6'];

        if ($purchaseType == "subscription" && $transactionStatus == "Subscription-Payment-Success") {
            if ($subscriptionPaymentNumber > 1) {
                echo ' The payment is for a recurring subscription.
					// Check if TEST MODE is on/off and apply the proper logic. 
					// If Test Mode is ON then no transaction reference number will be returned.
					// A subscription reference number will be returned.
					// Process the order here by cross referencing the received data with your database. 														
					// Check that the total amount paid was the expected amount.
					// Check that the amount paid was for the correct service.
					// Check that the currency is correct.
					// ie: if ($totalAmountReceived == 50) ... etc ...
					// After verification, update your database accordingly.';
            } else {
                echo " It is an initial payment for a subscription ";
                // Check if there was a trial period
                if ($subscriptionTrialPeriodLength > 0) {
                    if ($subscriptionTrialAmount == 0) {
                        echo 'It is a FREE trial and no transaction reference number is returned.
							// Check if TEST MODE is on/off and apply the proper logic.
							// A subscription reference number will be returned.
							// Process the order here by cross referencing the received data with your database.
							// After verification, update your database accordingly.';
                    } elseif ($subscriptionTrialAmount > 0) {
                        echo 'Is is a PAID trial and transaction reference number will be returned.
							// Check if TEST MODE is on/off. and apply the proper logic. 
							// If Test Mode is ON then no transaction reference number will be returned.
							// A subscription reference number will be returned.
							// Process the order here by cross referencing the received data with your database. 														
							// Check that the total amount paid was the expected amount.
							// Check that the amount paid was for the correct service.
							// Check that the currency is correct.
							// ie: if ($totalAmountReceived == 50) ... etc ...
							// After verification, update your database accordingly.';
                    } else {
                        echo "The trial amount is invalid.";
                        // Take appropriate action.
                    }
                } else {
                    echo' There is no trial and the payment is the first installment of the subscription.
						// Check if TEST MODE is on/off and apply the proper logic. 
						// If Test Mode is ON then no transaction reference number will be returned.
						// A subscription reference number will be returned.
						// Process the order here by cross referencing the received data with your database. 														
						// Check that the total amount paid was the expected amount.
						// Check that the amount paid was for the correct service.
						// Check that the currency is correct.
						// ie: if ($totalAmountReceived == 50) ... etc ...
						// After verification, update your database accordingly.';
                }
            }
        } else {
            switch ($transactionStatus) {
                case "Subscription-Expired":
                    echo" Take appropriate when the subscription has reached its terms.";
                    break;
                case "Subscription-Payment-Failed":
                    echo" Take appropriate actions when a payment attempt has failed.";
                    break;
                case "Subscription-Payment-Rescheduled":
                    echo" Take appropriate actions when a payment is rescheduled.";
                    break;
                case "Subscription-Canceled":
                    echo " Take appropriate actions regarding a cancellation.";
                    break;
                default:
                    echo" Take a default action in the case that none of the above were handled.";
                    break;
            }
        }
    }
} else {
    echo'something is wrong, no response is received from Payza';
}
?>
	
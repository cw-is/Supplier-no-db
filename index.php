<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Information</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>

<div class="container">
    <h1>Supplier Information</h1>

    <form action="process.php" method="POST">
        <div class="input-field">
            <input id="supplier_name" type="text" name="supplier_name" required>
            <label for="supplier_name">Supplier Name</label>
        </div>
        <div class="input-field">
            <input id="telephone_number" type="tel" name="telephone_number" required>
            <label for="telephone_number">Telephone Number</label>
        </div>
        <div class="input-field">
            <input id="email_address" type="email" name="email_address" required>
            <label for="email_address">Email Address</label>
        </div>
        <div class="input-field">
            <input id="contract_title" type="text" name="contract_title" required>
            <label for="contract_title">Contract Title</label>
        </div>
        <div class="input-field">
            <input id="last_meeting_date" type="date" name="last_meeting_date" required>
            <label for="last_meeting_date">Last Meeting Date</label>
        </div>
        <div class="input-field">
            <textarea id="comments" class="materialize-textarea" name="comments" required></textarea>
            <label for="comments">Comments</label>
        </div>
        <button class="btn waves-effect waves-light" type="submit" name="submit">Submit</button>
    </form>
</div>
<div class="container">
    <h2>Current Records</h2>
    <div id="records"></div>
</div>

<script>
    fetch('process.php')
        .then(response => response.json())
        .then(data => {
            const recordsElement = document.getElementById('records');
            data.forEach(record => {
                const recordElement = document.createElement('div');
                recordElement.innerHTML = `
                    <h5>${record.supplier_name}</h5>
                    <p>Telephone: ${record.telephone_number}</p>
                    <p>Email: ${record.email_address}</p>
                    <p>Contract Title: ${record.contract_title}</p>
                    <p>Last Meeting Date: ${record.last_meeting_date}</p>
                    <p>Comments: ${record.comments}</p>
                    <hr>
                `;
                recordsElement.appendChild(recordElement);
            });
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Add Service</title>
</head>
<body>

    <h2>Add Service</h2>

    <form method="POST" action="/services">
        @csrf

        <div>
            <label>Service Name:</label>
            <input type="text" name="name" required>
        </div>

        <div>
            <label>Description:</label>
            <textarea name="description"></textarea>
        </div>

        <div>
            <label>Price:</label>
            <input type="number" name="price" step="0.01" required>
        </div>

        <div>
            <label>Category:</label>
            <input type="text" name="category">
        </div>

        <button type="submit">Add Service</button>
    </form>

</body>
</html>
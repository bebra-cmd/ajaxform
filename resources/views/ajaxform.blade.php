<div>
    <meta name="csrf" content="{{ csrf_token() }}">
    <form id="ajaxForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="phone_number">Phone number:</label>
        <input type="tel" id="phone_number" name="number">
        <button type="submit">Submit</button>
    </form>
</div>
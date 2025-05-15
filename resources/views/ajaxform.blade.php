<html>
<body>
<div>
    <meta name="csrf" content="{{ csrf_token() }}">
    <form id="ajaxForm">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="phone_number">Phone number:</label>
        <input type="tel" id="number" name="number"> 
        <button type="submit">Submit</button>
    </form>
</div>
<script src="{{ asset('js/axios.min.js')}}"></script>
<script src="{{ asset('js/logic.js')}}"></script>
</body>
</html>
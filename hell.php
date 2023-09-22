<!DOCTYPE html>
<html>
<head>
    <title>Close Window Alert</title>
</head>
<body> 
<script language="JavaScript">
    window.onbeforeunload = confirmExit;
    function confirmExit() {
        return "You have attempted to leave this page. Are you sure?";
    }
</script>

<p>Try closing the window or tab, and you'll see an alert message.</p>

</body>
</html>

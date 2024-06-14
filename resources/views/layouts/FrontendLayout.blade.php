<!DOCTYPE html>
<html lang="en">
<head>
  @include("partial.user.head")

</head>
<body>
@include("partial.user.header")
<div class="content-page">
    @yield("content")
</div>
@include("partial.user.footer")
@include('partial.user.bodyJS')
</body>
</html>

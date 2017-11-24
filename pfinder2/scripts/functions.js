<script type="text/javascript">
function KeepCount() {

var NewCount = 0

if (document.choose.student.checked)
{NewCount = NewCount + 1}

if (document.choose.client.checked)
{NewCount = NewCount + 1}

if (NewCount == 2)
{
alert('Pick Just One Please')
document.choose; return false;
}
} 
</script>
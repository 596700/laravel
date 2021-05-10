{{$username}}様<br />
ウォッチ中の製品 {{$product_name}}/{{$product_version}} が影響を受ける脆弱性 {{$cve}} が新たに登録されました。<br />
以下のURLにてご確認ください。<br />
{{url('vulnerability/' . $cve_id )}}
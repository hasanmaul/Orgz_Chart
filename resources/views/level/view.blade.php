@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
		
				<div class="panel-heading">Organizational Chart</div>

				<div class="panel-body">
					<div id="show_orgz"></div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('footer')

	<script type="text/javascript">

	$("#show_orgz").getOrgChart({

		primaryColumns: ["name", "title"],
		orientation:4,
		dataSource:[
			@foreach($data as $key)

			{ id:{{ $key->id}} ,
				parent:{{ ($key->parent==0)?'null':$key->parent }},
				name:'{{$key->nama}}',
				title:'{{$key->posisi}}' }, 

			@endforeach
		],
		boxesColor: [
			{ id: 4, color: "blue" },
			{ id: 7, color: "lightteal" }
				
		]
	});
	$("#show_orgz a, .get-oc-tb").remove();
	$(".get-oc-tb").css('top',0);
	$(".get-oc-tb").css('height',$("#show_orgz").css("height"));

	</script>

@endsection

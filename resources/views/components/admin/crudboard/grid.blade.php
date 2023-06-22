@php
    $actionCount = $grid->getActions()->count();
@endphp
	
	<!-- Content-->
	<div class="content">
	    <div class="row mb-3">
			<div class="col-sm-6">
	        	<h1 class="h3 d-inline align-middle">{{$attributes['title']}}</h1>
			</div>
			<div class="col-sm-6 text-center pull-right">
			@foreach($grid->getActions()->getCrudBoardActions() as $crudAction)
				<a class="btn btn-primary" href="{{route($crudAction->getRouteName(),$crudAction->getRouteParameters())}}">
					<i class="fas fa-plus"></i> New	
				</a>
			@endforeach	
			</div>
	    </div>
	    <div class="card mb-3">
	        <div class="card-body">
	         
	            <div class="bd-example">
	                <table class="table table-sm table-bordered">
	                    <thead>
	                        <tr>
	                            <th scope="col">#</th>
								@foreach( $grid->getColumns() as $column)
									<th scope="col {{ $column->getCssClass() }}">{{ $column->getLabel()}}</th>
								@endforeach
								<th scope="col" style="width: 15%">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
						@forelse($grid->getGridData() as $k=>$row)
	                        <tr>
	                            <th scope="row">{{$k+1}}</th>
								@foreach( $grid->getColumns() as $column)
	                            	<td>{{$row[$column->getName()]}}</td>
								@endforeach
								
	                            <td class="text-right">
								  @if($grid->getActions()->count())
										@foreach($grid->getActions()->getRowActions() as $rowAction)
												@php
												  $routeParams = $rowAction->getRouteParameters();  
												  $routeParams['id'] = $row['id'];
												@endphp
												@switch($rowAction->getName())
													@case('detail')
													<a class="btn btn-info btn-sm"  href="{{route($rowAction->getRouteName(),$routeParams)}}">
														<i class="fas fa-file-lines"></i>
													</a>
													@break
													@case('edit')
													<a class="btn btn-primary btn-sm" href="{{route($rowAction->getRouteName(),$routeParams)}}">
															<i class="fas fa-pen-to-square"></i> 
													</a>
													@break
													@case('delete')
													<a class="btn btn-danger btn-sm"  href="{{route($rowAction->getRouteName(),$routeParams)}}">
															<i class="fas fa-times"></i> 
													</a>
													@break
													@default
													<a class="btn btn-sm {{ $rowAction->getCssClass() }}" href="{{route($rowAction->getRouteName(),$routeParams)}}">
															<i class="fas {{ $rowAction->getIcon() }}"> </i>
													</a>
												@endswitch
										@endforeach
								@endif
								</td>

	                        </tr>
						@empty
							<tr>
								 <td colspan="{{$grid->getColumns()->count()+2}}" class="text-center">No record is found</td>
							</tr>
						@endforelse
	                      
	                    </tbody>
	                </table>
	            </div>
	        </div>
	    </div>
	</div>
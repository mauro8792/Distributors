


    <p>New Sale: </p>
    <form class="form-group" method="POST" action="/sales">
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text"  class="form-control" value="{{$employee->name}}" disabled >
            <input type="hidden"  name="id_employee" value="{{$employee->id}}">
        </div>
              
        
        <div class="form-goup">
            <label for="">Select to Product</label>
            
               <select name="products">
                   @foreach($products as $prod)
                        <option value="{{$prod->id}}">{{$prod->name}}</option>
                    @endforeach
                </select>
        </div>  
        <div class="form-group">
            <label for="">Amount</label>
            <input type="text" name="amount" class="form-control"  >
        </div>     
        

        
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form> 


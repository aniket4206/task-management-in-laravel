<div class="container">
     <div class="row d-flex justify-content-center mt-4">
         <div class="col col-sm-12 col-md-6 col-lg-4 flex-row ">
             <form wire:submit.prevent="addTodo">
                 <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label">Todo</label>
                     <input type="text" class="form-control  @error('newTodo') is-invalid @enderror"
                         id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter todo"
                         wire:model="newTodo">
                     @error('newTodo')
                         <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                 </div>

                 <button type="submit" class="btn btn-success">Add Todo</button>

             </form>
         </div>
     </div>
 </div>

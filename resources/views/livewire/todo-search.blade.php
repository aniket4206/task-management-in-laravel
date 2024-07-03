<form wire:submit.prevent="search">
        <div class="row d-flex align-items-end justify-content-end ">
            <div class="col col-sm-12 col-md-5 col-lg-3">
                <input type="text" class="form-control" id="exampleInputSearch1" aria-describedby="searchHelp"
                    placeholder="Search" wire:model.live="query">
            </div>
        </div>
    </form>

<div>

    <main class="content d-flex p-0">
        <div class="container d-flex flex-column">
            <div class="row h-100">
                <div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">

                        <div class="text-center mt-4">
                            <h1 class="h2">Welcome Back</h1>
                            <p class="lead">
                                Sign in to your account to continue
                            </p>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="m-sm-4">

                                    <form wire:submit.prevent="login">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control form-control-lg" type="email" wire:model.defer="email" placeholder="Enter your email" />
                                            @error('email')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control form-control-lg" type="password" wire:model.defer="password" placeholder="Enter your password" />
                                            @error('password')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror

                                        </div>
                                        <div>
                                            <div class="custom-control custom-checkbox align-items-center">
                                                <input type="checkbox" class="custom-control-input" value="remember-me" wire:model.defer="remember-me" checked>
                                                <label class="custom-control-label text-small">Remember me next time</label>
                                            </div>
                                        </div>
                                        <div class="text-center mt-3">
                                            <button type="submit" class="btn btn-lg btn-primary">Sign in</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>

</div>

<template>
    <nav class="navbar  navbar-light border border-dark text-dark light" style='background:#B0F0EC'>
        <div class='nav justify-content-start w-25'>
            <h1>Username</h1>
        </div>
        <ul class="nav justify-content-end w-75 p-3 ">
            <li class="nav-item mr-3 ml-2">
                <a class="nav-link active text-dark font-weight-bold" href="#">My events</a>
            </li>
            <li class="nav-item mr-2 ml-2">
                <a class="nav-link text-dark font-weight-bold" href="#">Find Event</a>
            </li>
            <li class="nav-item dropdown font-weight-bold">
                <a class="nav-link dropdown-toggle text-dark " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu mt-4">
                    <a class="dropdown-item " href="#">#</a>
                    <a class="dropdown-item" href="#">#</a>
                    <a class="dropdown-item" href="#">#</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">#</a>
                </div>
            </li>
            <li>
                <button type="button" class="btn btn-info border border-dark">Sign Out</button>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {};
</script>

<style>

</style>
<?= $this->include('layouts/header') ?>

<main class="main-content container my-4">

    <!-- Hero Section -->
    <section class="hero bg-white p-4 p-md-5 rounded shadow-sm text-center text-md-start">
        <div class="row align-items-center">
            <div class="col-md-8 mx-auto">
                <h1 class="fw-bold mb-3">Find Expert Tutors Near You</h1>
                <p class="text-muted mb-4">
                    Connect with qualified home tutors for school, college, or competitive exams. 
                    Learn smarter with The Home Tutor!
                </p>
                <a href="/register" class="btn btn-danger btn-lg px-4">Get Started</a>
            </div>
        </div>
    </section>

    <!-- Featured Tutors -->
    <section class="tutors mt-5">
        <h2 class="section-title fw-bold mb-4 text-center">Featured Tutors</h2>

        <div class="row g-4">
            <!-- Tutor 1 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light text-danger fw-bold d-flex align-items-center justify-content-center rounded me-3" style="width:60px;height:60px;">
                                RS
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Rohit Sharma</h5>
                                <small class="text-muted">M.Sc, Physics | 6 years</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-muted me-1">Class 9-12</span>
                            <span class="badge bg-light text-muted me-1">JEE Coaching</span>
                            <span class="badge bg-light text-muted">Online & Home</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">₹400/hr</span>
                            <button class="btn btn-danger btn-sm">Book Trial</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor 2 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light text-danger fw-bold d-flex align-items-center justify-content-center rounded me-3" style="width:60px;height:60px;">
                                AS
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Anjali Singh</h5>
                                <small class="text-muted">B.Ed, English | 4 years</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-muted me-1">Class 6-10</span>
                            <span class="badge bg-light text-muted me-1">Spoken English</span>
                            <span class="badge bg-light text-muted">Online</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">₹300/hr</span>
                            <button class="btn btn-danger btn-sm">Book Trial</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tutor 3 -->
            <div class="col-sm-6 col-md-4">
                <div class="card h-100 shadow-sm border-0">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-light text-danger fw-bold d-flex align-items-center justify-content-center rounded me-3" style="width:60px;height:60px;">
                                MK
                            </div>
                            <div>
                                <h5 class="fw-bold mb-0">Maya Kapoor</h5>
                                <small class="text-muted">PhD, Chemistry | 8 years</small>
                            </div>
                        </div>

                        <div class="mb-3">
                            <span class="badge bg-light text-muted me-1">Class 11-12</span>
                            <span class="badge bg-light text-muted me-1">NEET</span>
                            <span class="badge bg-light text-muted">Home & Online</span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold text-danger">₹550/hr</span>
                            <button class="btn btn-danger btn-sm">Book Trial</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="testimonials mt-5">
        <h2 class="section-title fw-bold mb-4 text-center">What Students Say</h2>

        <div class="row g-4">
            <div class="col-sm-6 col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 text-center">
                    <strong>"Got 92% in Maths — thanks Rohit sir!"</strong>
                    <div class="text-muted mt-2">— Priya, Class 12</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 text-center">
                    <strong>"Anjali improved my English speaking quickly."</strong>
                    <div class="text-muted mt-2">— Aman, College</div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <div class="card border-0 shadow-sm h-100 p-3 text-center">
                    <strong>"Great NEET tips from Maya ma'am."</strong>
                    <div class="text-muted mt-2">— Suman, NEET aspirant</div>
                </div>
            </div>
        </div>
    </section>
</main>

<?= $this->include('layouts/footer') ?>

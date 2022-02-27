@extends('layouts.frontend-layout')
@section('content')

	<!-- Start sub-menu-banner-section -->
	<div class="sub-menu-banner-section" style="background-image: url('{{asset('frontend/img/services/b-2.jpg')}}');">
		<div class="overlay"></div>
		<div class="container" style="z-index: 9999;">
			<div class="row wow zoomIn" style="visibility: visible; animation-name: zoomIn;">
				<div class="col-md-12">
					<div>
						<div class="title">
							<h3 class="text-center">Terms & Condition</h3>
						</div>
						<nav aria-label="breadcrumb" style="display: flex; justify-content: center; z-index: 999;">
							<ol class="breadcrumb" style="z-index: 9;">
								<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
								<span class="test-separator"></span>
								<li class="breadcrumb-item active" aria-current="page">Terms & Condition</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End sub-menu-banner-section -->



	<!-- Start About Section Here -->
	<section class="about-section faq-section terms-section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-6">
					<div class="section-heading mb-4">
						<span class="subheading">Terms</span>
						<h3>Terms & Condition</h3>
					</div>
				</div>
			</div>
			<div class="row flex-column-reverse flex-lg-row">
				<div class="col-md-12 col-lg-12 d-flex align-items-center">
					<div>
						<h4 class="pb-2" style="font-weight:700;">Terms of Services</h4>
						<p class="mb-4">
							Last updated: 20 December, 2021 <br><br>
							Please go through these Terms of Service ("Terms", "Terms of Service") carefully before browsing the https://kormo465.com website (the "Service") operated by kormo365 ("us", "we", or "our").<br><br>
							Your access to and use of the Service is conditioned on your acceptance of and compliance with these Terms. These Terms apply to all visitors, users and others who access or use the Service.
						</p>
						
						<h4 class="pb-2" style="font-weight:700;">Links To Other Web Sites</h4>
						<p class="mb-4">
							Our Service may contain links to third-party web sites or services that are not owned or controlled by csejobs.<br><br>
							csejobs has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that csejobs shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services. <br><br>
							We strongly advise you to read the terms and conditions and privacy policies of any third-party web sites or services that you visit.
						</p>

						<h4 class="pb-2" style="font-weight:700;">Termination</h4>
						<p class="mb-4">
							We may terminate or suspend access to our Service immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms. <br><br>

							All provisions of the Terms which by their nature should survive termination shall survive termination, including, without limitation, ownership provisions, warranty disclaimers, indemnity and limitations of liability.
						</p>
						<h4 class="pb-2" style="font-weight:700;">Governing Law</h4>
						<p class="mb-4">
							These Terms shall be governed and construed in accordance with the laws of Bangladesh, without regard to its conflict of law provisions. <br><br>

							Our failure to enforce any right or provision of these Terms will not be considered a waiver of those rights. If any provision of these Terms is held to be invalid or unenforceable by a court, the remaining provisions of these Terms will remain in effect. These Terms constitute the entire agreement between us regarding our Service, and supersede and replace any prior agreements we might have between us regarding the Service.
						</p>
						<h4 class="pb-2" style="font-weight:700;">Changes</h4>
						<p class="mb-4">
							We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material we will try to provide at least 15 days notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion. <br><br>

							By continuing to access or use our Service after those revisions become effective, you agree to be bound by the revised terms. If you do not agree to the new terms, please stop using the Service.
						</p>
						<h4 class="pb-2" style="font-weight:700;">Contact Us</h4>
						<p class="mb-4">							If you have any questions about these Terms, please contact us.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Section Here -->

	@endsection
@extends('frontpage.dashboard')

<style>
    .accordion-button{
        background-color: #800080 !important;
        color: #fff !important;
    }
    .accordion-button::after{
    content: "";
    background: #fff;
    transform: scale(1.2);
    border-radius: 3px;
    transition: .5s !important;
}
</style>

@section('main')
    <main id="main">
        <!-- ======= Intro Single ======= -->
    <section class="intro-single">
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-lg-8">
              <div class="title-single-box">
                <h1 class="title-single">Frequently Asked Questions</h1>
              </div>
            </div>
            <div class="col-md-12 col-lg-4">
              <nav aria-label="breadcrumb" class="breadcrumb-box d-flex justify-content-lg-end">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    About
                  </li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section><!-- End Intro Single-->
  
      <!-- ======= About Section ======= -->
      <section class="section-about">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
                <h5>FREQUENTLY ASKED QUESTIONS</h5>
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                            Location of Installment Houses
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                        <div class="accordion-body">
                            Discover our affordable installment houses and properties strategically positioned in Lagos, Ogun, Ibadan, and Abuja. The monthly payment spread varies depending on the chosen location of your house.

                            The payment terms and prices in upscale areas like Lekki will differ from those in Ikate Ajah or Ibeju-Lekki. For instance, bungalows in Mowe offer a more cost-effective option, priced below N15 million with an installment period ranging from 18 to 36 months.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                            Mortgage Options in Nigeria:
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Curious about mortgage houses in Nigeria? Yes, mortgage opportunities are available for selected locations. We can guide you through a curated list of mortgage houses in both Lagos and other regions.

                            Moreover, our team is ready to provide valuable advice on the requirements and steps involved in purchasing a house with a mortgage in Nigeria. After a thorough assessment of your income and financial situation, we can guide you on whether a mortgage house aligns best with your needs.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                            Availability of Mortgage Houses:
                        </button>
                      </h2>
                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                        <div class="accordion-body">
                            Yes, we facilitate mortgage options for selected locations. Our team can guide you through a list of mortgage houses in Lagos and beyond. We provide advice on the requirements and steps to purchase a house with a mortgage in Nigeria. After evaluating your income and finances, we offer insights into whether a mortgage house is the best fit for you.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                            Affordability and Alternative Options:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            If the installment houses exceed your current income, we conduct a thorough assessment to recommend alternative houses or locations within your budget. We guide you toward more affordable options with flexible payment terms. Additionally, we educate you on investment portfolios to grow your funds before making a final decision.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
                            Location of Installment Houses:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            Our affordable installment houses and properties are strategically located in Lagos, Ogun, Ibadan, and Abuja. The monthly payment spread varies, contingent upon the chosen property's location. Payment terms and prices in prominent areas like Lekki differ from those in Ikate Ajah or Ibeju-Lekki. For instance, bungalows in Mowe offer a more budget-friendly option, priced below N15 million with an installment period ranging from 18 to 36 months.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
                            Preferred Location without Installment Houses:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            While we strive to offer installment houses in various locations, it's important to note that we don't guarantee availability in all areas of Lagos, Abuja, or Ibadan. Installment houses are currently more prevalent in specific places such as Lekki, Ajah, Ibeju, Mowe, Arepo, Isheri, Kubwa, Lugbe, etc.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSeven" aria-expanded="false" aria-controls="panelsStayOpen-collapseSeven">
                            Initial Deposit for Monthly Installments:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseSeven" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            The initial deposit varies based on the location. Some deposits are as low as 250k to 500k, while others can range from 5m to 10m for places like Ajah, Lekki, Katampe, etc.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEight" aria-expanded="false" aria-controls="panelsStayOpen-collapseEight">
                            Subscription from Abroad:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseEight" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            If you're based abroad, you can subscribe to a house installment without being physically present. Fill out the subscription form for the chosen property, and our consultants can guide you through the process. Virtual inspections, including 3D views or floor plans for off-plan developments, can be arranged. Representatives can also visit the property on your behalf for confirmation.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseNine" aria-expanded="false" aria-controls="panelsStayOpen-collapseNine">
                            Types of Houses Available:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseNine" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            A variety of house types are available, including flat apartments, maisonettes, and duplexes in locations like Lekki. Additionally, there are 2 or 3 bedroom bungalows in areas such as Ikate, Ajah. All properties are situated in secure estates with basic amenities like water, security, and well-maintained access roads provided by the estate companies.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTen" aria-expanded="false" aria-controls="panelsStayOpen-collapseTen">
                            Government Involvement:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTen" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            No, the installment houses and estates on our platform are privately owned. Private estate companies handle the construction and management without direct government intervention. However, these estates are registered with relevant government agencies to comply with town planning regulations.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseEleven" aria-expanded="false" aria-controls="panelsStayOpen-collapseEleven">
                            Documents After First Payment:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseEleven" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            After the first deposit, you receive a receipt acknowledging payment and a Contract of Sale or Deed of Contract. The contract outlines the property details, total amount, monthly payment, and agreed payment duration. Full ownership is granted after full payment, formalized through a Deed of Assignment.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwelve" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwelve">
                            Security of Ownership:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwelve" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            All agreements are legally documented, signed, and sealed. As long as you adhere to the monthly installment schedule and don't default, you will receive your house keys. The terms and duration of delivery, especially for properties under development, are clearly outlined in the Contract of Sale.
                          </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThirteen" aria-expanded="false" aria-controls="panelsStayOpen-collapseThirteen">
                            Land Purchase with Monthly Payments:
                          </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThirteen" class="accordion-collapse collapse">
                          <div class="accordion-body">
                            Yes, you can buy land in locations like Epe, Ikorodu, Agbara, Ibeju, Ajah with 6 to 12 months installment plans. Monthly payments for land will be determined by the specific location.
                          </div>
                        </div>
                      </div>
                </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@endsection
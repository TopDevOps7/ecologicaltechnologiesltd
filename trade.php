<?php
	include_once("layouts/header.php");

?>

<!-- Home Begin -->
<section id="trade" class="green-wave-gold page-section py-0">
    <!-- Slider main container -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" onClick="slider1()" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" onClick="slider2()" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" onClick="slider3()" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" onClick="slider4()" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" id="flight" src="assets/images/product/trade1.jpg" alt="First slide" />
                <div class="text-group">
                    <p>TRADE & PROCESSING</p>
                    <p>Our semi-finished products can be the core of your products!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="trucks" src="assets/images/product/trade2.jpg" alt="Second slide" />
                <div class="text-group">
                    <p>TRADE & PROCESSING</p>
                    <p>Our semi-finished products can be the core of your products!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="space" src="assets/images/product/trade3.jpg" alt="Third slide" />
                <div class="text-group">
                    <p>TRADE & PROCESSING</p>
                    <p>Our semi-finished products can be the core of your products!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" id="yachts" src="assets/images/product/trade4.jpg" alt="yachts slide" />
                <div class="text-group">
                    <p>TRADE & PROCESSING</p>
                    <p>Our semi-finished products can be the core of your products!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="content-section">
        <div class="container text-center">
            <div class="header_text">
                <p>Products from Ecological Technologies are used in a variety of applications. With their excellent
                    machining possibilities, our honeycombs and panels can easily be processed by our customers to their
                    desired contours. Our material is easy to saw, drill, and mill. Standard panels are manufactured
                    2500mm long and 1250mm wide.
                </p>
            </div>
            <div class="content">
                <p>
                    Ecological Technologies is a global player in the field of high-quality and sophisticated composite
                    materials. We serve our customers from all over the world from three production sites.
                </p>
            </div>
            <div class="product_section">
                <h2>Trade & Processing Products
                </h2>
                <p>We provide technical solutions based on demanding composite materials. Customer needs are our focus
                    whether we develop new solutions or customize exactly according to specifications. We give you the
                    most suitable support for your business plan.
                </p>
                <p class="product_detail">Interact for product details.</p>
                <div class="product_item">
                    <div class="row productgroup">
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Nomex.jpg" />
                                <div class="button_field">
                                    <p>Nomex® Honeycomb</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#nomex">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/alt-covering-sheets.jpg" />
                                <div class="button_field reduce">
                                    <p>Panels with alternative covering sheets
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#assemblies">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/3D-ECM_Kachel.jpg" />
                                <div class="button_field">
                                    <p>Aluminium Honeycomb 3D (ECM-3D)​</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Kevlar®">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/FSW-Kachel1.jpg" />
                                <div class="button_field">
                                    <p>FSW Products</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#honeycomb">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/honeycombs.jpg" />
                                <div class="button_field">
                                    <p>Honeycombs</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#honeycombs">Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row productgroup">
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Formteile_Details_F03.jpg" />
                                <div class="button_field">
                                    <p>Formed / Machined Parts</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Formteile">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/laminats.jpg" />
                                <div class="button_field">
                                    <p>Laminates</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#laminats">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Aluwabe.jpg" />
                                <div class="button_field">
                                    <p>Aluminium Honeycomb​
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#finished">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/finished-parts.jpg" />
                                <div class="button_field">
                                    <p>Finished Parts
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#covering">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Paneel_varianten.jpg" />
                                <div class="button_field reduce">
                                    <p>Panels With Alternative Cores</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Preassemblies">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/assemblies.jpg" />
                                <div class="button_field">
                                    <p>Preassemblies</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#assemblies_">Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_section">
                <h2>Trade & Processing Technologies</h2>
                <p>To provide the optimal solution for your customer, you need to be proficient in a variety of
                    technologies. Starting with the production of honeycomb, the core of our business, we have
                    continually evolved to produce an entire range of demanding composite materials to satisfy our
                    customers’ needs.
                </p>
                <p class="product_detail">Interact for product details.</p>
                <div class="product_item">
                    <div class="row productgroup">
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/finished-parts-and-assembly.jpg" />
                                <div class="button_field">
                                    <p>Finished parts and assembly</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#finished-parts-and-assembly">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Quality-Control-and-Measuring-Equipment.jpg" />
                                <div class="button_field">
                                    <p>Quality Control and Measuring Equipment</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Quality-Control-and-Measuring-Equipment">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/cad-cam.jpg" />
                                <div class="button_field">
                                    <p>CAD/CAM</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#cad-cam">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/FSW_Dienstleistung_Kachel1.jpg" />
                                <div class="button_field">
                                    <p>Friction Stir Welding (FSW)
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#resin-transfer-molding">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/coating-line.jpg" />
                                <div class="button_field">
                                    <p>Coating Line</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#coating-line">Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row productgroup">
                        <div class="col-md-3">
                            <div class="image_item_area">
                                <img src="assets/images/product/Honeycomb-Production.jpg" />
                                <div class="button_field">
                                    <p>Honeycomb Production
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Honeycomb-Production">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="image_item_area">
                                <img src="assets/images/product/Autoclave.jpg" />
                                <div class="button_field">
                                    <p>Autoclave</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Autoclave">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="image_item_area">
                                <img src="assets/images/product/sandwich-panel-production.jpg" />
                                <div class="button_field">
                                    <p>Sandwich Panel Production</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#sandwich-panel-production">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="image_item_area">
                                <img src="assets/images/product/cnc-centers.jpg" />
                                <div class="button_field">
                                    <p>CNC-Centers</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#cnc-centers">Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="product_section">
                <h2>Services</h2>
                <p>Additionally, we offer a variety of services related to our composite products.</p>
                <p class="product_detail">Interact for product details.</p>
                <div class="product_item">
                    <div class="row rail">
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/fire-testing.jpg" />
                                <div class="button_field">
                                    <p>Fire Testing</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#fire-testing">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/CAD_Tech-Kachel.jpg" />
                                <div class="button_field">
                                    <p>CAD Construction</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#CAD_Tech-Kachel">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Rontgen-Kachel.jpg" />
                                <div class="button_field">
                                    <p>X-Ray Facility</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Rontgen-Kachel">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/CAD_Konstruktion_Details.jpg" />
                                <div class="button_field reduce">
                                    <p>Calculation Using the Finite Element Method
                                    </p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#CAD_Konstruktion_Details">Information</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="image_item_area">
                                <img src="assets/images/product/Materialprufung_Kachel.jpg" />
                                <div class="button_field">
                                    <p>Material Testing</p>
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#Materialprufung_Kachel">Information</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nomex" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Nomex.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Nomex® Honeycomb</h2>
                    <p>ECA-(I) core is a non-metallic, light-weight structural material mainly used as core element in
                        sandwich composite constructions.
                    </p>
                    <p>For the production of this core aramid-fibres calendered to a foil are coated with phenolic
                        resin.</p>
                    <p>The ECA-(I) core possesses extremely high strength-to-weight ratios. It is also electrically and
                        thermally insulating, chemically and corrosion as well as shock and fatigue resistant.
                        Furthermore the core is easy to form and is self-extinguishing.
                    </p>
                    <p>These properties make ECA-(I) core an ideal construction material for light-weight applications.
                        Typical applications are for formula 1 racing cars, ski industry, yacht building, light-weight
                        panels, flow directionalisers, rail transport or superstructures.
                    </p>
                    <p>The standard programme of ECOLOGIAL TECHNOLOGIES® comprises of ECA-(I) core types with cell sizes
                        ranging from 3.2 to 19.2mm and a density of between 24 and 200 kg/m³. Production of other core
                        types is possible upon enquiry. In addition to the hexagonal cell sizes on offer, a delivery
                        programme is also available for rectangular-celled core, an excellent material for forming
                        purposes.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Kevlar®" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/3D-ECM_Kachel.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Aluminium Honeycomb 3D (ECM-3D)</h2>
                    <p>Unlike the classic hexagonal honeycomb the new 3D honeycomb generation can bring in almost any
                        desired shape . Our 3D aluminum honeycomb offers many advantages compared using the conventional
                        aluminum honeycomb. The excellent ductility in all directions allows tight radius or greater
                        thicknesses of honeycomb slices without the risk of structural damage. Furthermore our
                        groundbreaking cell geometry allows small cell sizes with almost the same density, compressive
                        and shear values ​​compared to classic hexagonal cell geometry. The 3D honeycomb can be used
                        with the out-of-autoclave process. This kind of processing allows a variety of combinations of
                        materials, cell sizes and densities.
                    </p>
                    <p>Currently, the following honeycomb types are available: ECM 3D 6.4-88 (aluminum 3003 with
                        zirconia coating)
                    </p>
                    <p>Other cell sizes and densities are available on request.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="honeycomb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/FSW-Kachel1.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>FSW products
                    </h2>
                    <p>FSW (Friction Stir Welding) is an innovative low-temperature welding process. Due to rotation and
                        pressure of a tool frictional heat is produced and the parts soften plastically in the area of
                        the rotating tool without reaching the melting point thereby joining the parts.
                    </p>
                    <p>FSW allows light weight solutions, that contrary to conventional products still allow the
                        customer to apply many processing and treatment technologies like welding, cathodic bath
                        coating, powder coating, etc.
                    </p>
                    <p>Single extruded profiles are used to weld together larger structures. This technology offers big
                        advantages as a cost-effective process in cases where large extrusions with thin walls or an
                        asymmetrical design need to be manufactured.
                    </p>
                    <p>With our modern double-head welding unit we can produce large-format panels with dimensions of
                        3000 x 13540mm. Due to the single-step welding of both sides a flatness of 2mm per running meter
                        is possible.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="honeycombs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/honeycombs.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Honeycombs</h2>
                    <p>ECOLOGICAL TECHNOLOGIES® manufactures honeycomb core materials from a great variety of raw
                        materials and in a large program of cell sizes and densities.
                    </p>
                    <p>With our new honeycomb types we support our customers for their new aircraft generations.</p>
                    <p>Now available products for our customers include the improved Kevlar® honeycomb , the fiberglass
                        honeycomb or the 3 dimensional formable Nomex® honeycomb and the aluminum honeycomb in alloy
                        3003 with a chrome-free corrosion protection.</p>
                    <p>In addition, we have developed a novel, perforated aramid honeycomb, which provides venting of
                        the cells with minimal loss of mechanical properties. The perforation of all honeycomb cell
                        sizes and thicknesses is intended for the aviation and space application.
                    </P>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Formteile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Formteile_Details_F03.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Formed / Machined Parts</h2>
                    <p>ECOLOGICAL TECHNOLOGIES® offers the design and the manufacturing of heat-forming equipment. The
                        corresponding manual and machined processing of honeycomb and parts, as well as the cold and hot
                        forming of honeycomb parts and sandwich structures (two heat forming ovens).
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="laminats" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/laminats.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Laminates</h2>
                    <p>By combining different materials into finished laminates, all component properties can be
                        preserved in order to realize customer requirements in terms of strength and quality.
                    </p>
                    <p>No matter what material: woven or any type of non-woven material: ECOLOGICAL TECHNOLOGIES®
                        combines for the customer fiber materials and resin and manufactures small and large format
                        laminates with the optimum, cost-effective production technology. Laminates are applied where,
                        for example, only the higher stressed areas need to be thicker than the less exposed segments.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="finished" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Aluwabe.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Aluminium Honeycomb
                    </h2>
                    <p>Our ECM honeycomb is tailored to your needs with different cell sizes and densities, according to
                        your requirements.
                    </p>
                    <p>The aluminium honeycomb of ECOLOGICAL TECHNOLOGIES® is particularly suitable for different
                        applications in the industrial sector. The material is coated with zirconium oxide in order to
                        prevent corrosion. We offer densities weights of 29 Kg/m3 up to 130Kg/m3, service temperatures
                        between -55 ° C and 177 ° C and thicknesses up to 300 mm.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="covering" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/finished-parts.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Finished Parts
                    </h2>
                    <p>Pre-finished parts according to your specifications!
                    </p>
                    <p>Our services include the production of precisely, pre-finished parts with all the necessary
                        inserts, reinforcements, profiles, primers and coatings.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="assemblies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/glass-fiber-honeycomb.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Panels With Alternative Covering Sheets
                    </h2>
                    <p>An almost unlimited number of combinations of core material, skin material and adhesives. The
                        customer`s requirements are the base for ECOLOGICAL TECHNOLOGIES® to construct the optimal panel
                        for the application and processing situation. The panel design is depending on, for example,
                        weight, strength or fire protection requirements, behavior in a corrosive environment and
                        temperature resistance.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="assemblies_" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/assemblies.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Preassemblies</h2>
                    <p>Many customers are already supplied by Ecological Technologies with almost all plastic or
                        composite components for their products. So the next step for these customers was obvious, to
                        carry out the logistics of materials and accessories as well as the mounting of assemblies.
                    </p>
                    <p>Our customers can focus on their core business because of the ET-Group as their reliable and
                        efficient system provider. Since we deliver finished assemblies we are able to work with our
                        customers together already in the design phase in order to improve product quality and reduce
                        costs.
                    </p>
                    <p>For the aircraft industry we provide, for example, toilet modules, galleys and floor coverings of
                        passenger aircrafts. In addition, crew cabins for fire fighting vehicles, mobile containers and
                        ready-to-assemble floor components for rail vehicles are manufactured.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Preassemblies" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Paneel_varianten.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Panels With Alternative Cores
                    </h2>
                    <p>
                        An almost unlimited number of combinations of core material, skin material and adhesives. The
                        customer`s requirements are the base for ECOLOGICAL TECHNOLOGIES® to construct the optimal panel
                        for the application and processing situation. The panel design is depending on, for example,
                        weight, strength or fire protection requirements, behavior in a corrosive environment and
                        temperature resistance.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="finished-parts-and-assembly" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/finished-parts-and-assembly.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Finished parts and assembly
                    </h2>
                    <p>Since ECOLOGICAL TECHNOLOGIES® manufactures nearly all plastic or composites components for many
                        customers, it became obvious to them to entrust ET to care also for the logistics of accessories
                        and the assembly of the complete component groups– ready for the integration into the final
                        product.
                    </p>
                    <p>By this our customers can concentrate on their core business as they have a reliable and
                        effective system-provider in the ET-Group.
                    </p>
                    <p>As ET supplies the complete assembly group, we now can work already in the design stage with the
                        customer to achieve better product properties and lower cost.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Quality-Control-and-Measuring-Equipment" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Quality-Control-and-Measuring-Equipment.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Quality Control and Measuring Equipment </h2>
                    <p>Compliance with customer tolerances is our highest quality objective. Therefore we are improving
                        our testing methods and instruments permanently.
                    </p>
                    <p>Our testing tools and procedures include universal testing machines (2.5 kN, 50 kN and 100 kN),
                        climate and salt fog spray chambers, heat flux calorimeter (DSC), Titro processing, NBS smoke
                        density measurement, “Food cart roller” testing machine, coordinate measuring Machines (CMM),
                        NDT: Woodpecker, rapping hammer, ultrasonic and laser projection.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cad-cam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/cad-cam.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>CAD/CAM
                    </h2>
                    <p>CAD / CAM software offers the precise construction of 2- and 3-dimensional shapes.
                    </p>
                    <p>We use the following CAD software: Siemens NX, CATIA, Dassault / DELMIA / ENOVIA, Autodesk
                        AutoCAD and following CAM Software: Siemens NX, 3- and 5-axis programming and ISV Integrated
                        simulation and testing. The data is exchanged via NX or CATIA native format. We use STEP,
                        Parasolid or IGES for 3D. DXF, PDF, CGM are used for drawings and 2D shapes.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="resin-transfer-molding" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/FSW_Dienstleistung_Kachel1.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Friction Stir Welding (FSW)
                    </h2>
                    <p>Friction Stir Welding (FSW) joins two parts with a specially shaped, rotating tool.
                    </p>
                    <p>Due to rotation and pressure of the tool frictional heat is produced and the parts soften
                        plastically in the area of the rotating tool without reaching the melting point.
                    </p>
                    <p>The pin of the tool immerses into the malleable material of the parts and produces by its
                        rotation and shape a homogenous blend along the joining line. The shoulder of the tool forms and
                        smoothes the welding line with only a marginal ridge.
                    </p>
                    <p>After cooling there is a solid phase joint of the two parts. The process does not need filler
                        wire, welding flux or gas shielding and produces a sealed weld without porosity and without
                        inclusions.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="resin-infusion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/resin-infusion.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Resin Transfer Molding (RMT) </h2>
                    <p>For larger series or double-sided decorative surfaces the Resin Transfer-Molding (RTM) process is
                        well suited. Massive closed mold and counter-mold system are used as the resin is introduced
                        under pressure into the mold system.
                    </p>
                    <p>This process pays off for high quality parts and / or components, which are produced in larger
                        quantities. </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Honeycomb-Production" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Honeycomb-Production.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Honeycomb Production</h2>
                    <p>ECOLOGICAL TECHNOLOGIES® has four production lines for the aramid honeycomb production and
                        another line for the production of aluminum honeycomb. We have two printer lines for Nomex®,
                        Kevlar® and one for aluminum. Simultaneous lay-up of 7 blocks with automatic machines plus
                        resources for hand lay-up in case of production peaks is possible. Our honeycomb production
                        consists of one 5-opening-block-press, two 3-opening-block-presses, one single opening
                        RF-block-press, seven dip tanks, four stabilization ovens, eleven curing ovens and sixteen
                        aramid honeycomb saws and two aluminum honeycomb saws.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="clean-room-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/clean-room-edit.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Clean Rooms</h2>
                    <p>The highest level of quality assurance!</p>
                    <p>In our clean rooms, the concentration of airborne particles is kept as low as necessary to
                        produce and test high-precision products for you.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Autoclave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Autoclave.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Autoclave</h2>
                    <p>Our autoclaves are used for thermal treatment of fiber composite materials in overpressure range.
                    </p>
                    <p>The thermal treatment of the substances happen in batches because of the typically occurring
                        sealing against the surrounding atmosphere.
                    </p>
                    <p>The high pressure inside the autoclave is used to compress the individual laminate layers.
                        Generally, the component is simultaneously evacuated in order to completely remove excessive air
                        from the fiber composite.
                    </p>
                    <p>
                        ECOLOGICAL TECHNOLOGIES® currently has two autoclaves in operation:
                    </p>
                    <p>
                        ø 2000 x 6000 mm (6 bar) respectively ø 3000 x 8000 mm (8 bar), with a 24-point respectively
                        40-point vacuum measuring system and curing temperatures of 180 ° C (standard) up to a maximum
                        of 250 ° C.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="sandwich-panel-production" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/sandwich-panel-production.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Sandwich Panel Production
                    </h2>
                    <p>Up to 15 meters component length pressable in one single shot!
                    </p>
                    <p>On our modern presses we manufacture panels and parts with all established core materials and
                        skins of prepreg, aluminum or laminates (HPL and CPL). Our capabilities include 14 presses, with
                        5 multi-daylight presses and 2 large format presses with 12 meters respectively 15 meters
                        pressable component length.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="cnc-centers" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/cnc-centers.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>CNC-Center
                    </h2>
                    <p>Our CNC systems allow high-precision machining of composite products.
                    </p>
                    <p>CNC machines are automatically able to produce through the use of advanced control technology
                        workpieces with high precision for complex shapes. They exceed mechanically controlled machines
                        in precision and speed. Our CNC machining systems offer opportunities for full light metal,
                        plastics, wood, foam, honeycomb, laminates and for GRP, CRP and ARP.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="coating-line" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/coating-line.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Coating Line
                    </h2>
                    <p>The painting is also part of our services, to relieve you even at this step!
                    </p>
                    <p>The maximum dimensions of the components to be painted are 3100 x 5200 mm. The air temperature
                        for drying is continuously adjustable up to a maximum of 120 ° C. All coating systems which are
                        suitable for high pressure airbrushing, can be processed.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="easa-logo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/easa-logo.png" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>EASA PART 21 CUSTOMIZED TRAINING COURSES</h2>
                    <p>Individual training courses, held by experienced experts for groups/companies/interested persons.
                    </p>
                    <p>Our training courses are customized to the various specific demands of companies and different
                        customers. We offer training for everybody who is interested in well-founded education within
                        the scope of Design Organization approval (EASA Part 21 J), Production Organization approval
                        (EASA Part 21 G), cabin safety and STC. We target not only companies who want to expand the
                        capabilities by acquiring Part 21G or Part 21 J approval, but also experienced professionals
                        aiming to refresh their know-how or to gather a first overview of a new field of operation.
                    </p>
                    <p>All trainings come with a certificate and are held by approved experts with practical experience
                        on a high level.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="fire-testing" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/fire-testing.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Fire Testing</h2>
                    <p>Material testing and risk assessment according to the highest aviation standards!
                    </p>
                    <p>
                        Our fire tests are designed specifically for the needs of interior design in the civil aviation
                        industry. We examine, for example, after ABD0031 (Airbus Directive). This includes testing and
                        risk assessment of material behavior regarding flammability, heat, smoke and degassing of toxic
                        vapors. We investigate the fire length, the extinction time and dropping time of the material.
                    </p>
                    <p>Our test range includes the 60 seconds vertical-burn test, the smoke-density test, the
                        smoke-toxicity test and the heat-release test.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CAD_Tech-Kachel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/CAD_Tech-Kachel.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>CAD Construction</h2>
                    <p>Your data will be used in the creation of expressive 3D models!</p>
                    <p>
                        We can import your 3D CAD data directly and thus ensure full interoperability. The design of
                        mechanical parts in 3D using parametric modeling is also part of our service range.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Rontgen-Kachel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Rontgen-Kachel.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>X-Ray Facility
                    </h2>
                    <p>High level non-destructive testing in XXL size!
                    </p>
                    <p>
                        Our X-ray facility has a length of 6 meters, a width of 4 meters and a height of 3 meters. With
                        these dimensions, we are able to test large components.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="CAD_Konstruktion_Details" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/CAD_Konstruktion_Details.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Calculation Using The Finite Element Method
                    </h2>
                    <p>We can simulate for you! </p>
                    <p>
                        The finite element method (FEM) is a numerical technique for finding approximate solutions to
                        boundary value problems for partial differential equations.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="Materialprufung_Kachel" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="assets/images/product/Materialprufung_Kachel.jpg" />
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Material Testing
                    </h2>
                    <p>We test our material to its limits and beyond!</p>
                    <p>
                        The material test is comprised of various test methods by which the performance of our products
                        is determined by mechanical, thermal or chemical stresses. The products are thereby checked for
                        errors and defects and resilience. Depending on the requirements we can perform both destructive
                        and non-destructive testing.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">
                        <a href="document.php"> Documents & Technical Information</a>
                    </button>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
function slider1() {
    setTimeout(() => {
        $("#flight").addClass("zoomin");
        $("#yachts").removeClass("zoomin");
        $("#trucks").removeClass("zoomin");
        $("#space").removeClass("zoomin");
    }, 1500);
}

function slider2() {
    setTimeout(() => {
        $("#trucks").addClass("zoomin");
        $("#flight").removeClass("zoomin");
        $("#space").removeClass("zoomin");
        $("#yachts").removeClass("zoomin");
    }, 1500);
}

function slider3() {
    setTimeout(() => {
        $("#space").addClass("zoomin");
        $("#flight").removeClass("zoomin");
        $("#trucks").removeClass("zoomin");
        $("#yachts").removeClass("zoomin");
    }, 1500);
}

function slider4() {
    setTimeout(() => {
        $("#yachts").addClass("zoomin");
        $("#flight").removeClass("zoomin");
        $("#trucks").removeClass("zoomin");
        $("#space").removeClass("zoomin");
    }, 1500);
}
$('.carousel').carousel({
    interval: false,
    ride: true
})

$(function() {
    $(window).resize((e) => {

    });
    $('.carousel-control-next').click(function() {

        let num = $(".carousel-indicators>li.active").attr("data-slide-to");
        console.log(num);
        if (num == 0) {
            setTimeout(() => {
                $("#trucks").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#space").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 1) {
            setTimeout(() => {
                $("#space").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 2) {
            setTimeout(() => {
                $("#yachts").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
        if (num == 3) {
            setTimeout(() => {
                $("#flight").addClass("zoomin");
                $("#yachts").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
    })
    $('.carousel-control-prev').click(function() {
        let num = $(".carousel-indicators>li.active").attr("data-slide-to");
        console.log(num);
        if (num == 0) {
            setTimeout(() => {
                $("#yachts").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
        if (num == 3) {
            setTimeout(() => {
                $("#space").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 2) {
            setTimeout(() => {
                $("#trucks").addClass("zoomin");
                $("#flight").removeClass("zoomin");
                $("#space").removeClass("zoomin");
                $("#yachts").removeClass("zoomin");
            }, 1500);
        }
        if (num == 1) {
            setTimeout(() => {
                $("#flight").addClass("zoomin");
                $("#yachts").removeClass("zoomin");
                $("#trucks").removeClass("zoomin");
                $("#space").removeClass("zoomin");
            }, 1500);
        }
    })
    $("#flight").addClass("zoomin")
    $('a[href="trade.php"]').parent().parent().parent().addClass("active");
    $('a[href="trade.php"]').parent().siblings().removeClass("active");
    $('.carousel').carousel({
        interval: false,
        ride: true
    })
});
</script>

<?php 

  include_once("layouts/footer.php");

?>
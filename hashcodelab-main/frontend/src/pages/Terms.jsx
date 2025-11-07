import React from 'react';

const Terms = () => {
  return (
    <div className="min-h-screen" data-testid="terms-page">
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div className="container mx-auto px-4">
          <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6" data-testid="terms-title">Terms & Conditions</h1>
          <p className="text-base sm:text-lg text-blue-100">Last updated: {new Date().toLocaleDateString()}</p>
        </div>
      </section>

      <section className="py-20">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto prose prose-lg">
            <h2>Agreement to Terms</h2>
            <p>
              By accessing or using HashCodeLab's services, you agree to be bound by these Terms and Conditions. If you disagree with any part of these terms, you may not access our services.
            </p>

            <h2>Services</h2>
            <p>
              HashCodeLab provides IT services including web design, development, app development, graphic design, SEO, and AI solutions. All services are subject to availability and may be modified or discontinued at any time.
            </p>

            <h2>Project Scope and Deliverables</h2>
            <p>
              Project scope, deliverables, timelines, and costs will be outlined in a separate project agreement. Changes to the agreed scope may result in additional fees and extended timelines.
            </p>

            <h2>Payment Terms</h2>
            <ul>
              <li>Payment terms will be specified in the project agreement</li>
              <li>A deposit may be required before work begins</li>
              <li>Late payments may incur additional fees</li>
              <li>Refunds are subject to our refund policy</li>
            </ul>

            <h2>Intellectual Property</h2>
            <p>
              Upon full payment, clients receive ownership of the final deliverables. HashCodeLab retains the right to showcase completed work in our portfolio unless otherwise agreed.
            </p>

            <h2>Client Responsibilities</h2>
            <p>Clients are responsible for:</p>
            <ul>
              <li>Providing timely feedback and approvals</li>
              <li>Supplying necessary content and materials</li>
              <li>Ensuring content legality and copyright compliance</li>
              <li>Maintaining backup copies of delivered work</li>
            </ul>

            <h2>Warranties and Disclaimers</h2>
            <p>
              We strive to deliver high-quality work but cannot guarantee specific results. Services are provided "as is" without warranties of any kind, express or implied.
            </p>

            <h2>Limitation of Liability</h2>
            <p>
              HashCodeLab shall not be liable for any indirect, incidental, special, or consequential damages arising from the use of our services.
            </p>

            <h2>Confidentiality</h2>
            <p>
              We respect the confidentiality of client information and will not disclose sensitive project details without permission.
            </p>

            <h2>Termination</h2>
            <p>
              Either party may terminate services with written notice. Termination terms and fees will be outlined in the project agreement.
            </p>

            <h2>Governing Law</h2>
            <p>
              These terms shall be governed by the laws of the jurisdiction in which HashCodeLab operates.
            </p>

            <h2>Changes to Terms</h2>
            <p>
              We reserve the right to modify these terms at any time. Continued use of our services constitutes acceptance of modified terms.
            </p>

            <h2>Contact</h2>
            <p>
              For questions about these Terms and Conditions, contact us at:
              <br />
              Email: legal@hashcodelab.com
              <br />
              Phone: +1 (555) 123-4567
            </p>
          </div>
        </div>
      </section>
    </div>
  );
};

export default Terms;
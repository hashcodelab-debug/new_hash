import React from 'react';
import { Target, Eye, Users, Award } from 'lucide-react';

const About = () => {
  const team = [
    { name: 'John Smith', role: 'CEO & Founder', image: 'https://i.pravatar.cc/300?img=12' },
    { name: 'Sarah Johnson', role: 'CTO', image: 'https://i.pravatar.cc/300?img=5' },
    { name: 'Mike Chen', role: 'Lead Developer', image: 'https://i.pravatar.cc/300?img=33' },
    { name: 'Emily Davis', role: 'Design Director', image: 'https://i.pravatar.cc/300?img=9' }
  ];

  return (
    <div className="min-h-screen" data-testid="about-page">
      {/* Hero */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto text-center">
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6" data-testid="about-hero-title">About HashCodeLab</h1>
            <p className="text-base sm:text-lg text-blue-100">
              Your trusted partner in digital transformation
            </p>
          </div>
        </div>
      </section>

      {/* Company Story */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto">
            <h2 className="text-3xl md:text-4xl font-bold mb-6 text-gray-900" data-testid="company-story-title">Our Story</h2>
            <p className="text-lg text-gray-600 mb-4">
              Founded in 2015, HashCodeLab began with a simple mission: to help businesses harness the power of technology to achieve their goals. What started as a small team of passionate developers has grown into a full-service IT company serving clients worldwide.
            </p>
            <p className="text-lg text-gray-600 mb-4">
              Over the years, we've completed hundreds of successful projects, from stunning websites to complex enterprise applications. Our commitment to quality, innovation, and client satisfaction has made us a trusted partner for businesses of all sizes.
            </p>
            <p className="text-lg text-gray-600">
              Today, we continue to push boundaries and explore new technologies, always staying ahead of the curve to provide our clients with cutting-edge solutions that drive real business results.
            </p>
          </div>
        </div>
      </section>

      {/* Mission & Vision */}
      <section className="py-20 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="grid md:grid-cols-2 gap-12">
            <div className="flex gap-6" data-testid="mission-section">
              <div className="flex-shrink-0">
                <div className="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                  <Target className="w-8 h-8 text-blue-600" />
                </div>
              </div>
              <div>
                <h3 className="text-2xl font-bold mb-4 text-gray-900">Our Mission</h3>
                <p className="text-gray-600">
                  To empower businesses with innovative technology solutions that drive growth, efficiency, and success. We're committed to delivering exceptional quality and building long-term partnerships with our clients.
                </p>
              </div>
            </div>
            <div className="flex gap-6" data-testid="vision-section">
              <div className="flex-shrink-0">
                <div className="w-16 h-16 bg-blue-100 rounded-lg flex items-center justify-center">
                  <Eye className="w-8 h-8 text-blue-600" />
                </div>
              </div>
              <div>
                <h3 className="text-2xl font-bold mb-4 text-gray-900">Our Vision</h3>
                <p className="text-gray-600">
                  To be the leading IT services provider globally, recognized for our innovation, excellence, and commitment to client success. We envision a future where technology seamlessly integrates with business to create extraordinary outcomes.
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Values */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl md:text-4xl font-bold mb-12 text-center text-gray-900" data-testid="values-title">Our Core Values</h2>
          <div className="grid md:grid-cols-3 gap-8">
            <div className="text-center" data-testid="value-excellence">
              <div className="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <Award className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">Excellence</h3>
              <p className="text-gray-600">We strive for excellence in every project, delivering the highest quality work.</p>
            </div>
            <div className="text-center" data-testid="value-innovation">
              <div className="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <Users className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">Innovation</h3>
              <p className="text-gray-600">We embrace new technologies and creative solutions to solve complex challenges.</p>
            </div>
            <div className="text-center" data-testid="value-integrity">
              <div className="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <Target className="w-8 h-8 text-white" />
              </div>
              <h3 className="text-xl font-semibold mb-2 text-gray-900">Integrity</h3>
              <p className="text-gray-600">We operate with transparency, honesty, and ethical practices in all we do.</p>
            </div>
          </div>
        </div>
      </section>

      {/* Team */}
      <section className="py-20 bg-gray-50">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl md:text-4xl font-bold mb-12 text-center text-gray-900" data-testid="team-title">Meet Our Team</h2>
          <div className="grid md:grid-cols-4 gap-8">
            {team.map((member, index) => (
              <div key={index} className="text-center" data-testid={`team-member-${index}`}>
                <img
                  src={member.image}
                  alt={member.name}
                  className="w-48 h-48 rounded-full mx-auto mb-4 object-cover"
                />
                <h3 className="text-xl font-semibold text-gray-900">{member.name}</h3>
                <p className="text-blue-600">{member.role}</p>
              </div>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
};

export default About;
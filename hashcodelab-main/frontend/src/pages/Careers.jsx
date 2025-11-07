import React from 'react';
import { Button } from '@/components/ui/button';
import { Briefcase, Users, TrendingUp, Award } from 'lucide-react';
import { Link } from 'react-router-dom';

const Careers = () => {
  const openings = [
    {
      title: 'Senior Full Stack Developer',
      location: 'Remote / Silicon Valley',
      type: 'Full-time',
      description: 'We are looking for an experienced Full Stack Developer to join our team.'
    },
    {
      title: 'UI/UX Designer',
      location: 'Remote',
      type: 'Full-time',
      description: 'Create beautiful and intuitive user experiences for our client projects.'
    },
    {
      title: 'Digital Marketing Specialist',
      location: 'Hybrid',
      type: 'Full-time',
      description: 'Drive digital marketing campaigns and SEO strategies for diverse clients.'
    }
  ];

  const benefits = [
    { icon: <Briefcase className="w-8 h-8" />, title: 'Flexible Work', desc: 'Remote and hybrid options available' },
    { icon: <Users className="w-8 h-8" />, title: 'Great Team', desc: 'Work with talented, passionate professionals' },
    { icon: <TrendingUp className="w-8 h-8" />, title: 'Growth', desc: 'Continuous learning and career development' },
    { icon: <Award className="w-8 h-8" />, title: 'Competitive Pay', desc: 'Industry-leading compensation packages' }
  ];

  return (
    <div className="min-h-screen" data-testid="careers-page">
      {/* Hero */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto text-center">
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6" data-testid="careers-title">Join Our Team</h1>
            <p className="text-base sm:text-lg text-blue-100">
              Build your career with a company that values innovation, creativity, and excellence.
            </p>
          </div>
        </div>
      </section>

      {/* Why Work With Us */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl md:text-4xl font-bold mb-12 text-center text-gray-900" data-testid="benefits-title">Why Work With Us</h2>
          <div className="grid md:grid-cols-4 gap-8">
            {benefits.map((benefit, index) => (
              <div key={index} className="text-center" data-testid={`benefit-${index}`}>
                <div className="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4 text-blue-600">
                  {benefit.icon}
                </div>
                <h3 className="text-xl font-semibold mb-2 text-gray-900">{benefit.title}</h3>
                <p className="text-gray-600">{benefit.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Open Positions */}
      <section className="py-20 bg-gray-50">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl md:text-4xl font-bold mb-12 text-center text-gray-900" data-testid="openings-title">Current Openings</h2>
          <div className="max-w-3xl mx-auto space-y-6">
            {openings.map((job, index) => (
              <div key={index} className="bg-white p-6 rounded-xl shadow-md" data-testid={`job-${index}`}>
                <div className="flex flex-col md:flex-row md:items-center md:justify-between mb-4">
                  <h3 className="text-xl font-semibold text-gray-900">{job.title}</h3>
                  <div className="flex gap-2 mt-2 md:mt-0">
                    <span className="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full">{job.type}</span>
                    <span className="text-sm bg-gray-100 text-gray-700 px-3 py-1 rounded-full">{job.location}</span>
                  </div>
                </div>
                <p className="text-gray-600 mb-4">{job.description}</p>
                <Link to="/contact">
                  <Button data-testid={`apply-button-${index}`}>Apply Now</Button>
                </Link>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="py-20">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-6 text-gray-900">Don't See a Perfect Match?</h2>
          <p className="text-lg text-gray-600 mb-8 max-w-2xl mx-auto">
            We're always looking for talented individuals. Send us your resume and we'll keep you in mind for future opportunities.
          </p>
          <Link to="/contact">
            <Button size="lg" className="bg-blue-600 hover:bg-blue-700" data-testid="send-resume-button">
              Send Your Resume
            </Button>
          </Link>
        </div>
      </section>
    </div>
  );
};

export default Careers;
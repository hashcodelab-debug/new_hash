import React from 'react';
import { useParams, Link } from 'react-router-dom';
import { Button } from '@/components/ui/button';
import { Check, ArrowRight } from 'lucide-react';

const ServicesPage = () => {
  const { serviceSlug } = useParams();

  const servicesData = {
    'web-design': {
      title: 'Web Design & Development',
      description: 'Create stunning, responsive websites that captivate your audience and drive business growth.',
      features: [
        'Custom website design',
        'Responsive mobile-first approach',
        'E-commerce solutions',
        'Content Management Systems',
        'Website maintenance & support',
        'Performance optimization'
      ],
      technologies: ['React', 'HTML5', 'CSS3', 'WordPress', 'Shopify', 'WooCommerce'],
      process: [
        { step: 'Discovery', desc: 'Understanding your business goals and requirements' },
        { step: 'Design', desc: 'Creating wireframes and visual designs' },
        { step: 'Development', desc: 'Building your website with clean, efficient code' },
        { step: 'Testing', desc: 'Rigorous quality assurance and browser testing' },
        { step: 'Launch', desc: 'Deploying your website and training your team' },
        { step: 'Support', desc: 'Ongoing maintenance and updates' }
      ],
      image: 'https://images.unsplash.com/photo-1547658719-da2b51169166?w=800'
    },
    'app-development': {
      title: 'App Development',
      description: 'Build powerful mobile applications for iOS and Android that engage users and deliver exceptional experiences.',
      features: [
        'Native iOS development',
        'Native Android development',
        'Cross-platform solutions',
        'Progressive Web Apps (PWA)',
        'App Store optimization',
        'Post-launch support'
      ],
      technologies: ['React Native', 'Swift', 'Kotlin', 'Flutter', 'Firebase', 'Node.js'],
      process: [
        { step: 'Consultation', desc: 'Discussing your app idea and target audience' },
        { step: 'Wireframing', desc: 'Creating user flow and interface mockups' },
        { step: 'Development', desc: 'Building your app with best practices' },
        { step: 'Testing', desc: 'Comprehensive testing on real devices' },
        { step: 'Deployment', desc: 'Publishing to App Store and Google Play' },
        { step: 'Maintenance', desc: 'Updates and feature enhancements' }
      ],
      image: 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=800'
    },
    'web-applications': {
      title: 'Web Applications',
      description: 'Develop robust, scalable web applications using modern frameworks and technologies.',
      features: [
        'Custom React applications',
        'PHP-based solutions',
        'WordPress development',
        'API development & integration',
        'Database design',
        'Cloud hosting setup'
      ],
      technologies: ['React', 'PHP', 'Laravel', 'WordPress', 'MySQL', 'MongoDB', 'AWS'],
      process: [
        { step: 'Requirements', desc: 'Gathering detailed functional requirements' },
        { step: 'Architecture', desc: 'Designing system architecture and database' },
        { step: 'Development', desc: 'Agile development with regular updates' },
        { step: 'Integration', desc: 'Integrating third-party services and APIs' },
        { step: 'Deployment', desc: 'Setting up hosting and deployment pipelines' },
        { step: 'Optimization', desc: 'Performance tuning and scaling' }
      ],
      image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800'
    },
    'graphic-design': {
      title: 'Graphic Design Services',
      description: 'Professional graphic design services that bring your brand vision to life with creativity and precision.',
      features: [
        'Logo design & branding',
        'Business card design',
        'Brochure & flyer design',
        'Social media graphics',
        'Print materials',
        'Image rendering & manipulation'
      ],
      technologies: ['Adobe Illustrator', 'Photoshop', 'InDesign', 'Figma', 'Sketch', 'After Effects'],
      process: [
        { step: 'Briefing', desc: 'Understanding your brand and design needs' },
        { step: 'Concepts', desc: 'Creating initial design concepts' },
        { step: 'Revisions', desc: 'Refining designs based on your feedback' },
        { step: 'Finalization', desc: 'Delivering final designs in all formats' },
        { step: 'Guidelines', desc: 'Providing brand style guidelines' },
        { step: 'Support', desc: 'Ongoing design support as needed' }
      ],
      image: 'https://images.unsplash.com/photo-1626785774573-4b799315345d?w=800'
    },
    'seo-marketing': {
      title: 'SEO & Digital Marketing',
      description: 'Comprehensive digital marketing services to boost your online visibility and drive qualified traffic.',
      features: [
        'Search Engine Optimization',
        'Pay-Per-Click advertising',
        'Social media marketing',
        'Content marketing',
        'Email marketing campaigns',
        'Analytics & reporting'
      ],
      technologies: ['Google Analytics', 'Google Ads', 'SEMrush', 'Hootsuite', 'Mailchimp', 'HubSpot'],
      process: [
        { step: 'Audit', desc: 'Analyzing your current online presence' },
        { step: 'Strategy', desc: 'Developing comprehensive marketing strategy' },
        { step: 'Implementation', desc: 'Executing campaigns across channels' },
        { step: 'Optimization', desc: 'Continuous testing and optimization' },
        { step: 'Reporting', desc: 'Regular performance reports and insights' },
        { step: 'Scaling', desc: 'Scaling successful campaigns' }
      ],
      image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800'
    },
    'ai-solutions': {
      title: 'AI Solutions & Chatbots',
      description: 'Leverage artificial intelligence to automate processes, enhance customer experience, and gain competitive advantage.',
      features: [
        'AI chatbot development',
        'Natural language processing',
        'Machine learning models',
        'Automated customer support',
        'AI integration services',
        'Predictive analytics'
      ],
      technologies: ['Python', 'TensorFlow', 'PyTorch', 'OpenAI', 'Dialogflow', 'GPT Models'],
      process: [
        { step: 'Analysis', desc: 'Identifying AI opportunities in your business' },
        { step: 'Design', desc: 'Designing AI system architecture' },
        { step: 'Training', desc: 'Training models with your data' },
        { step: 'Integration', desc: 'Integrating AI into your systems' },
        { step: 'Testing', desc: 'Validating AI performance and accuracy' },
        { step: 'Monitoring', desc: 'Ongoing monitoring and improvements' }
      ],
      image: 'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800'
    }
  };

  const service = servicesData[serviceSlug];

  if (!service) {
    return <div className="min-h-screen pt-32 text-center">Service not found</div>;
  }

  return (
    <div className="min-h-screen" data-testid="service-page">
      {/* Hero */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div className="container mx-auto px-4">
          <div className="max-w-3xl mx-auto text-center">
            <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mb-6" data-testid="service-title">{service.title}</h1>
            <p className="text-base sm:text-lg text-blue-100">{service.description}</p>
          </div>
        </div>
      </section>

      {/* Service Details */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <div>
              <img src={service.image} alt={service.title} className="rounded-xl shadow-lg" />
            </div>
            <div>
              <h2 className="text-3xl font-bold mb-6 text-gray-900" data-testid="features-title">What We Offer</h2>
              <div className="space-y-3">
                {service.features.map((feature, index) => (
                  <div key={index} className="flex items-start gap-3" data-testid={`feature-${index}`}>
                    <Check className="w-6 h-6 text-blue-600 flex-shrink-0 mt-1" />
                    <span className="text-gray-700">{feature}</span>
                  </div>
                ))}
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Technologies */}
      <section className="py-20 bg-gray-50">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl font-bold mb-12 text-center text-gray-900" data-testid="tech-title">Technologies We Use</h2>
          <div className="flex flex-wrap justify-center gap-4">
            {service.technologies.map((tech, index) => (
              <div key={index} className="bg-white px-6 py-3 rounded-full shadow-md" data-testid={`tech-${index}`}>
                <span className="font-medium text-gray-700">{tech}</span>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Process */}
      <section className="py-20">
        <div className="container mx-auto px-4">
          <h2 className="text-3xl font-bold mb-12 text-center text-gray-900" data-testid="process-title">Our Process</h2>
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {service.process.map((item, index) => (
              <div key={index} className="relative" data-testid={`process-${index}`}>
                <div className="bg-white p-6 rounded-xl shadow-md">
                  <div className="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center font-bold text-lg mb-4">
                    {index + 1}
                  </div>
                  <h3 className="text-xl font-semibold mb-2 text-gray-900">{item.step}</h3>
                  <p className="text-gray-600">{item.desc}</p>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="py-20 bg-gradient-to-r from-blue-600 to-blue-800 text-white" data-testid="service-cta">
        <div className="container mx-auto px-4 text-center">
          <h2 className="text-3xl md:text-4xl font-bold mb-6">Ready to Get Started?</h2>
          <p className="text-lg mb-8 text-blue-100 max-w-2xl mx-auto">
            Let's discuss your project and how our {service.title.toLowerCase()} can help you achieve your goals.
          </p>
          <Link to="/contact">
            <Button size="lg" className="bg-white text-blue-600 hover:bg-gray-100" data-testid="service-cta-button">
              Contact Us Today <ArrowRight className="ml-2 w-5 h-5" />
            </Button>
          </Link>
        </div>
      </section>
    </div>
  );
};

export default ServicesPage;
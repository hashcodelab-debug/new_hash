import React, { useState, useEffect } from 'react';
import { useParams, Link } from 'react-router-dom';
import axios from 'axios';
import { Button } from '@/components/ui/button';
import { ArrowLeft } from 'lucide-react';

const BACKEND_URL = process.env.REACT_APP_BACKEND_URL;
const API = `${BACKEND_URL}/api`;

const ProjectDetail = () => {
  const { slug } = useParams();
  const [project, setProject] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    fetchProject();
  }, [slug]);

  const fetchProject = async () => {
    try {
      const response = await axios.get(`${API}/projects/${slug}`);
      setProject(response.data);
    } catch (error) {
      console.error('Error fetching project:', error);
    } finally {
      setLoading(false);
    }
  };

  if (loading) {
    return <div className="min-h-screen pt-32 text-center">Loading...</div>;
  }

  if (!project) {
    return <div className="min-h-screen pt-32 text-center">Project not found</div>;
  }

  return (
    <div className="min-h-screen" data-testid="project-detail-page">
      {/* Hero */}
      <section className="bg-gradient-to-r from-blue-600 to-blue-800 text-white pt-32 pb-20">
        <div className="container mx-auto px-4">
          <Link to="/portfolio">
            <Button variant="outline" className="mb-6 border-white text-white hover:bg-white hover:text-blue-600" data-testid="back-to-portfolio">
              <ArrowLeft className="mr-2 w-4 h-4" /> Back to Portfolio
            </Button>
          </Link>
          <span className="text-blue-200 font-medium">{project.category}</span>
          <h1 className="text-4xl sm:text-5xl lg:text-6xl font-bold mt-2 mb-6" data-testid="project-title">{project.title}</h1>
          <p className="text-base sm:text-lg text-blue-100">{project.description}</p>
        </div>
      </section>

      {/* Project Image */}
      <section className="py-12">
        <div className="container mx-auto px-4">
          <img src={project.image} alt={project.title} className="w-full rounded-xl shadow-lg" data-testid="project-image" />
        </div>
      </section>

      {/* Project Details */}
      <section className="py-12">
        <div className="container mx-auto px-4">
          <div className="grid lg:grid-cols-3 gap-12">
            <div className="lg:col-span-2 space-y-8">
              <div data-testid="project-problem">
                <h2 className="text-2xl font-bold mb-4 text-gray-900">The Challenge</h2>
                <p className="text-gray-600">{project.problem}</p>
              </div>
              <div data-testid="project-solution">
                <h2 className="text-2xl font-bold mb-4 text-gray-900">Our Solution</h2>
                <p className="text-gray-600">{project.solution}</p>
              </div>
              <div data-testid="project-results">
                <h2 className="text-2xl font-bold mb-4 text-gray-900">Results</h2>
                <p className="text-gray-600">{project.results}</p>
              </div>
              {project.testimonial && (
                <div className="bg-blue-50 p-6 rounded-xl" data-testid="project-testimonial">
                  <h3 className="font-semibold mb-2 text-gray-900">Client Testimonial</h3>
                  <p className="text-gray-700 italic">"{project.testimonial}"</p>
                </div>
              )}
            </div>
            <div>
              <div className="bg-white p-6 rounded-xl shadow-md sticky top-24">
                <h3 className="font-semibold mb-4 text-gray-900">Project Info</h3>
                <div className="space-y-4">
                  <div>
                    <div className="text-sm text-gray-500 mb-1">Client</div>
                    <div className="font-medium text-gray-900">{project.client}</div>
                  </div>
                  <div>
                    <div className="text-sm text-gray-500 mb-1">Category</div>
                    <div className="font-medium text-gray-900">{project.category}</div>
                  </div>
                  <div>
                    <div className="text-sm text-gray-500 mb-2">Technologies</div>
                    <div className="flex flex-wrap gap-2">
                      {project.technologies.map((tech, index) => (
                        <span key={index} className="text-xs bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                          {tech}
                        </span>
                      ))}
                    </div>
                  </div>
                </div>
                <Link to="/contact" className="block mt-6">
                  <Button className="w-full bg-blue-600 hover:bg-blue-700" data-testid="start-project-button">
                    Start Your Project
                  </Button>
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
};

export default ProjectDetail;
using NUnit.Framework;
using palooza.data.Repo;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace palooza.tests.RepoTests
{
    [TestFixture]
    public class RepoTests
    {
        [SetUp]
       public void SetShitUp()
        {
            PaloozaDB db = new PaloozaDB(@"Data Source=(LocalDb)\palooza;Initial Catalog=Palooza;Integrated Security=True");
        }

        [Test]
        public void Chips()
        {
            Assert.Greater(PaloozaDB.Chips.List().ToList().Count(), 0);
        }
    }
}

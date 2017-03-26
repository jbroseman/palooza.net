using NUnit.Framework;
using palooza.data.Repo;
using palooza.domain.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using static System.Net.Mime.MediaTypeNames;

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
        public void Blinds()
        {
            Blind testBlind = new Blind()
            {
                Big = 420,
                Small = 69
            };

            PaloozaDB.Blinds.Delete(PaloozaDB.Blinds.List().Where(x => x.Equals(testBlind)));

            PaloozaDB.Blinds.Save(testBlind);
            Assert.AreEqual(PaloozaDB.Blinds.List().Where(x => x.Equals(testBlind)).Count(), 1);

            PaloozaDB.Blinds.Delete(PaloozaDB.Blinds.List().Where(x => x.Equals(testBlind)));
            Assert.AreEqual(PaloozaDB.Blinds.List().Where(x => x.Equals(testBlind)).Count(), 0);
        }

        [Test]
        public void Chips()
        {
            Chip myTestChip = new Chip()
            {
                Color = "period red",
                Value = 6969
            };

            PaloozaDB.Chips.Delete(PaloozaDB.Chips.List().Where(x => x.Equals(myTestChip)));

            PaloozaDB.Chips.Save(myTestChip);
            Assert.AreEqual(PaloozaDB.Chips.List().Where(x => x.Equals(myTestChip)).Count(), 1);

            PaloozaDB.Chips.Delete(PaloozaDB.Chips.List().Where(x => x.Equals(myTestChip)));
            Assert.AreEqual(PaloozaDB.Chips.List().Where(x => x.Equals(myTestChip)).Count(), 0);
        }
    }
}
